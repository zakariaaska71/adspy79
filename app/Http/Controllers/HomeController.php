<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use App\Category;
use App\Conteactsection;
use App\First;
use App\Post;
use App\Postrelated;
use App\Price;
use App\Product;
use App\Menu;
use App\Page;

use App\Resoure;
use App\Video;
use Carbon\Carbon;
use DateTime;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Storage;
use App\LikePost;
use Hash;
use App\Sectionone;
use App\Sectionthree;
use App\Productnew;
use App\AliExpressProduct;
use Illuminate\Support\Facades\Auth;
use App\CategoryAli;
use Illuminate\Support\Str;
use App\Jobs\UpdatePost;
use Illuminate\Support\Collection;
class HomeController extends Controller
{
    public function count()
    {
        
        $category_id = collect(Post::has('related')->has('resorese')->groupBy('post_id')
        ->get());
        $users = Post::has('related')->has('resorese')->groupBy('post_id');
        $usersUnique = $users->unique('post_id');
        $usersDupes = $users->diff($usersUnique);
        
        dd($users, $usersUnique, $usersDupes);

    }
    public function page($slug){
        $page = Page::where('slug',$slug)->first();
        return view('frontend.page')->with('blog',$page);
    }
    public function worwide(Request $request)
    {
        $query = Post::query()->where('is_fetured', 1)->with('related')->has('related')->with('resorese')->has('resorese')->where('country_see_inin','not like','%Worldwide%')->get();
        $arrr =[];
        foreach($query as $query){
        if(!in_array($query->country, $query->country_see_inin)){
           array_push($arrr,$query->id);
        }
      }
      $query = Post::query()->where('is_fetured', 1)->with('related')->has('related')->with('resorese')->has('resorese')->whereIn('_id',$arrr)->paginate(20);
    //   dd($arrr);
      return view('dashboard.post.index')->with('posts',$query)->with('request',$request);

        
    }
    public function new_fetured(Request $request)
    {
        if ($request->ajax()) {


            $currentPage = $request->input('offset', 1);
            // $offset = ($currentPage - 1) * 15;
            // dd($page);


            $query = Post::query()->where('is_fetured', 1)->with('related')->has('related')->with('resorese')->has('resorese');


            $query->when($request->post_type, function ($q) use ($request) {
                if ($request->post_type != 'all') {
                    return $q->where('ad_format', $request->post_type);
                }
            });
            $query->when($request->title, function ($q) use ($request) {
                if ($request->search_type == 'title') {
                    return $q->where('title', 'like', '%' . $request->title . '%');
                } elseif ($request->search_type == 'landanig_page') {
                    return $q->where('landanig_page', 'like', '%' . $request->title . '%');
                } elseif ($request->search_type == 'page_name') {

                    return $q->where('page_name', 'like', '%' . $request->title . '%');
                }
            });
            $query->when($request->obj, function ($q) use ($request) {
                if ($request->country != 'obj') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {

                        foreach ($request->obj as $keyword) {
                            $str = str_replace(' ', '_', $keyword);
                            $query->orWhere('button', 'LIKE', "%$keyword%")->orWhere('button', 'LIKE', "%$str%");
                        }
                    });
                }
            });

            $query->when($request->category, function ($q) use ($request) {
                if ($request->category != 'Category') {
                    return $q->where('category', 'like', '%' . $request->category . '%');
                }
            });
            $query->when($request->country, function ($q) use ($request) {
                if ($request->country != 'country') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {
                        foreach ($request->country as $keyword) {
                            $query->orWhere('country', 'LIKE', "%$keyword%");
                        }
                    });
                }
            });

            $query->when($request->lang, function ($q) use ($request) {
                if ($request->lang != 'lang') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {
                        foreach ($request->lang as $keyword) {
                            $query->orWhere('lang', 'LIKE', "%$keyword%");
                        }
                    });
                }
            });
            $query->when($request->enng, function ($q) use ($request) {
                if ($request->enng != 'undefined undefined') {

                    $longstring = explode(" ", $request->enng);

                    $firstsection = $longstring[0];
                    $secandsection = $longstring[1];
                    $firstStringCharacter = substr($secandsection, 0, 1);
                    if ($firstStringCharacter == '>') {
                        $secands = str_replace('>', '', $secandsection);
                        return $q->where($firstsection, '>=', (int)$secands);
                    } else {
                        $secand = explode("~", $secandsection);
                        $min = (int)$secand[0];
                        $max = (int)$secand[1];

                        return $q->whereBetween($firstsection, [$min, $max]);
                    }
                }
            });
            $query->when($request->min_max, function ($q) use ($request) {
                if ($request->min_max != 'undefined undefined~undefined') {
                    $longstring = explode(" ", $request->min_max);
                    $firstsection = $longstring[0];
                    $secandsection = $longstring[1];
                    $secand = explode("~", $secandsection);
                    $min = (int)$secand[0];
                    $max = (int)$secand[1];
                    return $q->whereBetween($firstsection, [$min, $max]);
                }
            });
            $query->when($request->radioValue, function ($q) use ($request) {
                if ($request->radioValue != 'all') {
                    $data_old = Carbon::now()->subDays($request->radioValue)->format('Y-m-d');

                    $date_new = Carbon::now()->format('Y-m-d');

                    return $q->whereBetween('post_create', [$data_old, $date_new]);
                }
            });
            $query->when($request->daterange, function ($q) use ($request) {
                $start = date('m/d/Y', strtotime(Carbon::now()->startOfMonth()));
                $end = date('m/d/Y', strtotime(Carbon::now()));
                if ($request->daterange != $start . " - " . $end) {
                    $date = explode(" - ", $request->daterange);
                    // dd($date[0],$date[1]);

                    $data_old = date("Y-m-d", strtotime($date[0]));
                    $date_new = date("Y-m-d", strtotime($date[1]));
                    // dd($data_old,$date_new);
                    return $q->whereBetween('post_create', [$data_old, $date_new]);
                }
            });
            $query->when($request->post_type, function ($q) use ($request) {

                if ($request->post_type != 'all') {

                    return $q->where('ad_format', $request->post_type);
                }
            });


            $posts = $query->orderBy($request->sort_by, 'desc')->paginate(15);
           

            $view= view('data')->with('posts', $posts)->render();
            return response()->json(['html' => $view, 'count' => $posts->total()]);
        }
    }
    public function update_posts(){
   
        
        $posts =   Post::with('related')->has('related')->with('resorese')->has('resorese')->chunk(20,function($data){
            dispatch(new UpdatePost($data));
        });
        return 'will updated';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderablel
     */
    public  function retrr()
    {
        $posts = Post::query()->with('related')->has('related')->with('resorese')->has('resorese')->skip(20000)->take(1000)->get();
        $array_country = [];
        $array_inter = [];

        foreach ($posts as $pr) {
            array_push($array_country, $pr->country_see_in);
            array_push($array_inter, $pr->interested);

            $pr->country_see_in_array_new = $array_country;
            $pr->inter_array_new = $array_inter;
            $pr->save();
        }
        dd('dd');
    }
    public function frontend()
    {
        // $posts = Post::get();
        // foreach($posts as $p){
        //     $p->category = json_encode(["Bags&Shoes"]);
        //     $p->save();
        //     dd($p);  
        // }

        $firstsection = First::first();
        $vedeosection = Video::first();
        $section2 = Sectionone::first();
        $section3 = Sectionthree::first();
        $about = About::first();
        $contact = Conteactsection::first();
        $header_menus = Menu::where('show', 1)->where('type', 'header')->orderBy('created_at', 'acs')->get();
        $footers_menus =Page::get();
        $products = Product::where('status', 'yes')->get();
        $prices = Price::where('status', 'yes')->get();
        // dd($header_menus);
        return view('frontend.index', compact('firstsection', 'vedeosection', 'about', 'products', 'prices', 'contact', 'header_menus', 'footers_menus', 'section2', 'section3'));
    }
    public function blog($slug)
    {
        $header_menus = Menu::where('show', 1)->where('type', 'header')->orderBy('created_at', 'acs')->get();
        $footers_menus = Menu::where('show', 1)->where('type', 'footer')->orderBy('created_at', 'desc')->get();
        $blog = Blog::where('slug', $slug)->first();
        $related = Blog::where('status', 'yes')->where('id', '!=', $blog->id)->get()->random(1);
        return view('frontend.blog')->with('header_menus', $header_menus)->with('footers_menus', $footers_menus)->with('blog', $blog)->with('relateds', $related);
    }
    public function products(Request $request)
    {

        $pros = Productnew::query();
        $pros->when($request->title, function ($q) use ($request) {
            return $q->where('title', 'like', '%' . $request->title . '%');
        });
        $pros->when($request->category, function ($q) use ($request) {
            return $q->where('category', 'like', '%' . $request->category . '%');
        });
        $pros->when($request->sort, function ($q) use ($request) {
            if ($request->sort == 'new') {
                return $q->orderBy('post_on', 'desc');
            } else {
                return $q->orderBy('post_on', 'asc');
            }
        });
        $products = $pros->paginate(9);

        return view('products', compact('products', 'request'));
    }
    public function productid(Request $request)
    {
        // dd($request);
        $post = Productnew::find($request->id);
        return view('data_post_modal')->with('item', $post);
    }
    public function user_update(Request $request)
    {
        $request_all = $request->except(['password', 'image']);
        if ($request->password != null) {
            if ($request->password != $request->password_confirmation) {
                return redirect()->back()->with(['error' => 'Password does not match']);
            }
            $request_all['password'] = Hash::make($request->password);
        }
        if ($request->image != null) {
            $request_all['image'] = $request->image->store('user_profile');
        }
        $user = auth()->user();
        $user->update($request_all);

        return redirect()->back()->with(['sucess' => 'The data has been successfully updated']);
    }
    public function profile()
    {
        if (!auth()->check()) {
            abort(403);
        }
        $key = \config('services.stripe.secret');
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->plans->all();
        $plans = Price::where('status','yes')->get();
        

        return view('front.profile')->with('user', auth()->user())->with('plans', $plans)->with('intent', auth()->user()->createSetupIntent());
    }
    public function like_post(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $post = Post::find($request->post_id);
          
            if($post->is_fetured != 1){
               
                $post->is_fetured = 1;
            }else{
           
                $post->is_fetured = 0;
            }
            $post->save();
            return '1';
        } else {
            $like = LikePost::where('user_id', Auth::id())->where('post_id', $request->post_id)->first();
            if ($like) {
                $like->delete();
                return '0';
            } else {
                $like = new LikePost();
                $like->post_id = $request->post_id;
                $like->user_id = auth()->id();
                $like->save();
                return '1';
            }
        }
    }
    public function index(Request $request)
    {
        $footers_menus = Menu::where('show', 1)->where('type', 'footer')->orderBy('created_at', 'acs')->get();

        // $query = Post::query()->whereHas('liks', function ($query) {
        //     $query->where('user_id', auth()->id());
        // })->with('related')->has('related')->with('resorese')->has('resorese');
        // $currentPage = (int)$request->input('offset', 0);

        // if ($request->ajax()) {



        //     // $currentPage = $request->input('offset', 1);
        //     // $offset = ($currentPage - 1) * 15;
        //     // dd($page);

        //     $query->when($request->post_type, function ($q) use ($request) {
        //         if ($request->post_type != 'all') {
        //             return $q->where('ad_format', $request->post_type);
        //         }
        //     });
        //     $query->when($request->title, function ($q) use ($request) {
        //         if ($request->search_type == 'title') {
        //             return $q->where('title', 'like', '%' . $request->title . '%');
        //         } elseif ($request->search_type == 'landanig_page') {
        //             return $q->where('landanig_page', 'like', '%' . $request->title . '%');
        //         } elseif ($request->search_type == 'page_name') {

        //             return $q->where('page_name', 'like', '%' . $request->title . '%');
        //         }
        //     });
        //     $query->when($request->obj, function ($q) use ($request) {
        //         if ($request->country != 'obj') {
        //             // $q->whereIn('country','like','%'. json_decode($request->country).'%');
        //             $result = $q->where(function ($query) use ($request) {

        //                 foreach ($request->obj as $keyword) {
        //                     $str = str_replace(' ', '_', $keyword);
        //                     $query->orWhere('button', 'LIKE', "%$keyword%")->orWhere('button', 'LIKE', "%$str%");
        //                 }
        //             });
        //         }
        //     });

        //     $query->when($request->category, function ($q) use ($request) {
        //         if ($request->category != 'Category') {
        //             return $q->where('category', 'like', '%' . $request->category . '%');
        //         }
        //     });
        //     $query->when($request->country, function ($q) use ($request) {
        //         if ($request->country != 'country') {
        //             // $q->whereIn('country','like','%'. json_decode($request->country).'%');
        //             $result = $q->where(function ($query) use ($request) {
        //                 foreach ($request->country as $keyword) {
        //                     $query->orWhere('country', 'LIKE', "%$keyword%");
        //                 }
        //             });
        //         }
        //     });

        //     $query->when($request->lang, function ($q) use ($request) {
        //         if ($request->lang != 'lang') {
        //             // $q->whereIn('country','like','%'. json_decode($request->country).'%');
        //             $result = $q->where(function ($query) use ($request) {
        //                 foreach ($request->lang as $keyword) {
        //                     $query->orWhere('lang', 'LIKE', "%$keyword%");
        //                 }
        //             });
        //         }
        //     });
        //     $query->when($request->enng, function ($q) use ($request) {
        //         if ($request->enng != 'undefined undefined') {

        //             $longstring = explode(" ", $request->enng);

        //             $firstsection = $longstring[0];
        //             $secandsection = $longstring[1];
        //             $firstStringCharacter = substr($secandsection, 0, 1);
        //             if ($firstStringCharacter == '>') {
        //                 $secands = str_replace('>', '', $secandsection);
        //                 return $q->where($firstsection, '>=', (int)$secands);
        //             } else {
        //                 $secand = explode("~", $secandsection);
        //                 $min = (int)$secand[0];
        //                 $max = (int)$secand[1];

        //                 return $q->whereBetween($firstsection, [$min, $max]);
        //             }
        //         }
        //     });
        //     $query->when($request->min_max, function ($q) use ($request) {
        //         if ($request->min_max != 'undefined undefined~undefined') {
        //             $longstring = explode(" ", $request->min_max);
        //             $firstsection = $longstring[0];
        //             $secandsection = $longstring[1];
        //             $secand = explode("~", $secandsection);
        //             $min = (int)$secand[0];
        //             $max = (int)$secand[1];
        //             return $q->whereBetween($firstsection, [$min, $max]);
        //         }
        //     });
        //     $query->when($request->radioValue, function ($q) use ($request) {
        //         if ($request->radioValue != 'all') {
        //             $data_old = Carbon::now()->subDays($request->radioValue)->format('Y-m-d');

        //             $date_new = Carbon::now()->format('Y-m-d');

        //             return $q->whereBetween('post_create', [$data_old, $date_new]);
        //         }
        //     });
        //     $query->when($request->daterange, function ($q) use ($request) {
        //         $start = date('m/d/Y', strtotime(Carbon::now()->startOfMonth()));
        //         $end = date('m/d/Y', strtotime(Carbon::now()));
        //         if ($request->daterange != $start . " - " . $end) {
        //             $date = explode(" - ", $request->daterange);
        //             // dd($date[0],$date[1]);

        //             $data_old = date("Y-m-d", strtotime($date[0]));
        //             $date_new = date("Y-m-d", strtotime($date[1]));
        //             // dd($data_old,$date_new);
        //             return $q->whereBetween('post_create', [$data_old, $date_new]);
        //         }
        //     });
        //     $query->when($request->post_type, function ($q) use ($request) {

        //         if ($request->post_type != 'all') {

        //             return $q->where('ad_format', $request->post_type);
        //         }
        //     });

        //     $ajaxpost = $query->skip($currentPage * 15)->take(15)->get();
        //     $count = $query->skip($currentPage * 15)->take(15)->count();


        //     $view = view('data')->with('posts', $ajaxpost)->render();
        //     return response()->json(['html' => $view, 'count' => $count]);
        // } else {

        //     $posts = $query->orderBy('last_seen_old', 'desc')->skip(0)->take(15)->get();
        // }
        // ->with('posts', $posts->unique('post_id'))
        return view('front.posts')->with('footers_menus', $footers_menus);
    }

    public function likes(Request $request)
    {
        $footers_menus = Menu::where('show', 1)->where('type', 'footer')->orderBy('created_at', 'acs')->get();

        return view('front.likes')->with('footers_menus', $footers_menus);
    }
    public function likes_now(Request $request)
    {
        if ($request->ajax()) {


            $currentPage = $request->input('offset', 1);
            // $offset = ($currentPage - 1) * 15;
            // dd($page);
           

            $query = Post::query()->whereHas('liks', function ($query) {
                $query->where('user_id', auth()->id());
            })->with('related')->has('related')->with('resorese')->has('resorese');

            $query->when($request->post_type, function ($q) use ($request) {
                if ($request->post_type != 'all') {
                    return $q->where('ad_format', $request->post_type);
                }
            });
            $query->when($request->title, function ($q) use ($request) {
                if ($request->search_type == 'title') {
                    return $q->where('title', 'like', '%' . $request->title . '%');
                } elseif ($request->search_type == 'landanig_page') {
                    return $q->where('landanig_page', 'like', '%' . $request->title . '%');
                } elseif ($request->search_type == 'page_name') {

                    return $q->where('page_name', 'like', '%' . $request->title . '%');
                }
            });
            $query->when($request->obj, function ($q) use ($request) {
                if ($request->country != 'obj') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {

                        foreach ($request->obj as $keyword) {
                            $str = str_replace(' ', '_', $keyword);
                            $query->orWhere('button', 'LIKE', "%$keyword%")->orWhere('button', 'LIKE', "%$str%");
                        }
                    });
                }
            });

            $query->when($request->category, function ($q) use ($request) {
                if ($request->category != 'Category') {
                    return $q->where('category', 'like', '%' . $request->category . '%');
                }
            });
            $query->when($request->country, function ($q) use ($request) {
                if ($request->country != 'country') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {
                        foreach ($request->country as $keyword) {
                            $query->orWhere('country', 'LIKE', "%$keyword%");
                        }
                    });
                }
            });

            $query->when($request->lang, function ($q) use ($request) {
                if ($request->lang != 'lang') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {
                        foreach ($request->lang as $keyword) {
                            $query->orWhere('lang', 'LIKE', "%$keyword%");
                        }
                    });
                }
            });
            $query->when($request->enng, function ($q) use ($request) {
                if ($request->enng != 'undefined undefined') {

                    $longstring = explode(" ", $request->enng);

                    $firstsection = $longstring[0];
                    $secandsection = $longstring[1];
                    $firstStringCharacter = substr($secandsection, 0, 1);
                    if ($firstStringCharacter == '>') {
                        $secands = str_replace('>', '', $secandsection);
                        return $q->where($firstsection, '>=', (int)$secands);
                    } else {
                        $secand = explode("~", $secandsection);
                        $min = (int)$secand[0];
                        $max = (int)$secand[1];

                        return $q->whereBetween($firstsection, [$min, $max]);
                    }
                }
            });
            $query->when($request->min_max, function ($q) use ($request) {
                if ($request->min_max != 'undefined undefined~undefined') {
                    $longstring = explode(" ", $request->min_max);
                    $firstsection = $longstring[0];
                    $secandsection = $longstring[1];
                    $secand = explode("~", $secandsection);
                    $min = (int)$secand[0];
                    $max = (int)$secand[1];
                    return $q->whereBetween($firstsection, [$min, $max]);
                }
            });
            $query->when($request->radioValue, function ($q) use ($request) {
                if ($request->radioValue != 'all') {
                    $data_old = Carbon::now()->subDays($request->radioValue)->format('Y-m-d');

                    $date_new = Carbon::now()->format('Y-m-d');

                    return $q->whereBetween('post_create', [$data_old, $date_new]);
                }
            });
            $query->when($request->daterange, function ($q) use ($request) {
                $start = date('m/d/Y', strtotime(Carbon::now()->startOfMonth()));
                $end = date('m/d/Y', strtotime(Carbon::now()));
                if ($request->daterange != $start . " - " . $end) {
                    $date = explode(" - ", $request->daterange);
                    // dd($date[0],$date[1]);

                    $data_old = date("Y-m-d", strtotime($date[0]));
                    $date_new = date("Y-m-d", strtotime($date[1]));
                    // dd($data_old,$date_new);
                    return $q->whereBetween('post_create', [$data_old, $date_new]);
                }
            });
            $query->when($request->post_type, function ($q) use ($request) {

                if ($request->post_type != 'all') {

                    return $q->where('ad_format', $request->post_type);
                }
            });

            $posts = $query->orderBy($request->sort_by, 'desc')->paginate(15);
           

            $view= view('data')->with('posts', $posts)->render();
            return response()->json(['html' => $view, 'count' => $posts->total()]);
        }
    }


    
    
    public function new_index(Request $request)
    {
        if ($request->ajax()) {


            $currentPage = $request->input('offset', 1);
            // $offset = ($currentPage - 1) * 15;
            // dd($page);

            $query = Post::query()->with('related')->has('related')->with('resorese')->has('resorese');

            $query->when($request->post_type, function ($q) use ($request) {
                if ($request->post_type != 'all') {
                    return $q->where('ad_format', $request->post_type);
                }
            });
            $query->when($request->title, function ($q) use ($request) {
                if ($request->search_type == 'title') {
                    return $q->where('title', 'like', '%' . $request->title . '%');
                } elseif ($request->search_type == 'landanig_page') {
                    return $q->where('landanig_page', 'like', '%' . $request->title . '%');
                } elseif ($request->search_type == 'page_name') {

                    return $q->where('page_name', 'like', '%' . $request->title . '%');
                }
            });
            $query->when($request->obj, function ($q) use ($request) {
                if ($request->country != 'obj') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {

                        foreach ($request->obj as $keyword) {
                            $str = str_replace(' ', '_', $keyword);
                            $query->orWhere('button', 'LIKE', "%$keyword%")->orWhere('button', 'LIKE', "%$str%");
                        }
                    });
                }
            });

            $query->when($request->category, function ($q) use ($request) {
                if ($request->category != 'Category') {
                    return $q->where('category', 'like', '%' . $request->category . '%');
                }
            });
            $query->when($request->country, function ($q) use ($request) {
                if ($request->country != 'country') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {
                        foreach ($request->country as $keyword) {
                            $query->orWhere('country', 'LIKE', "%$keyword%");
                        }
                    });
                }
            });

            $query->when($request->lang, function ($q) use ($request) {
                if ($request->lang != 'lang') {
                    // $q->whereIn('country','like','%'. json_decode($request->country).'%');
                    $result = $q->where(function ($query) use ($request) {
                        foreach ($request->lang as $keyword) {
                            $query->orWhere('lang', 'LIKE', "%$keyword%");
                        }
                    });
                }
            });
            $query->when($request->enng, function ($q) use ($request) {
                if ($request->enng != 'undefined undefined') {

                    $longstring = explode(" ", $request->enng);

                    $firstsection = $longstring[0];
                    $secandsection = $longstring[1];
                    $firstStringCharacter = substr($secandsection, 0, 1);
                    if ($firstStringCharacter == '>') {
                        $secands = str_replace('>', '', $secandsection);
                        return $q->where($firstsection, '>=', (int)$secands);
                    } else {
                        $secand = explode("~", $secandsection);
                        $min = (int)$secand[0];
                        $max = (int)$secand[1];

                        return $q->whereBetween($firstsection, [$min, $max]);
                    }
                }
            });
            $query->when($request->min_max, function ($q) use ($request) {
                if ($request->min_max != 'undefined undefined~undefined') {
                    $longstring = explode(" ", $request->min_max);
                    $firstsection = $longstring[0];
                    $secandsection = $longstring[1];
                    $secand = explode("~", $secandsection);
                    $min = (int)$secand[0];
                    $max = (int)$secand[1];
                    return $q->whereBetween($firstsection, [$min, $max]);
                }
            });
            $query->when($request->radioValue, function ($q) use ($request) {
                if ($request->radioValue != 'all') {
                    $data_old = Carbon::now()->subDays($request->radioValue)->format('Y-m-d');

                    $date_new = Carbon::now()->format('Y-m-d');

                    return $q->whereBetween('post_create', [$data_old, $date_new]);
                }
            });
            $query->when($request->daterange, function ($q) use ($request) {
                $start = date('m/d/Y', strtotime(Carbon::now()->startOfMonth()));
                $end = date('m/d/Y', strtotime(Carbon::now()));
                if ($request->daterange != $start . " - " . $end) {
                    $date = explode(" - ", $request->daterange);
                    // dd($date[0],$date[1]);

                    $data_old = date("Y-m-d", strtotime($date[0]));
                    $date_new = date("Y-m-d", strtotime($date[1]));
                    // dd($data_old,$date_new);
                    return $q->whereBetween('post_create', [$data_old, $date_new]);
                }
            });
            $query->when($request->post_type, function ($q) use ($request) {

                if ($request->post_type != 'all') {

                    return $q->where('ad_format', $request->post_type);
                }
            });



            $posts = $query->orderBy($request->sort_by, 'desc')->paginate(15);
           

            $view= view('data')->with('posts', $posts)->render();
            return response()->json(['html' => $view, 'count' => $posts->total()]);
        }
    }

    public function blogs()
    {
        $header_menus = Menu::where('show', 1)->where('type', 'header')->orderBy('created_at', 'acs')->get();
        $footers_menus = Menu::where('show', 1)->where('type', 'footer')->orderBy('created_at', 'acs')->get();
        return view('frontend.blogs')->with('header_menus', $header_menus)->with('footers_menus', $footers_menus)->with('blogs', Blog::where('status', 'yes')->paginate(6));
    }
    public function get_search(Request $request)
    {
        $query = Post::query()->with('related')->has('related')->with('resorese')->has('resorese');

        $footers_menus = Menu::where('show', 1)->where('type', 'footer')->orderBy('created_at', 'acs')->get();

        if ($request->search_type == 'title') {
            $query->where('title', 'like', '%' . $request->serach_text . '%');

            $posts = $query->get();
            return view('front.posts')->with('posts', $posts);
        }
        if ($request->search_type == 'landanig_page') {
            $query->where('landanig_page', 'like', '%' . $request->serach_text . '%');

            $posts = $query->get();


            return view('front.posts')->with('posts', $posts);
        }
        if ($request->search_type == 'page_name') {

            $query->where('page_name', 'like', '%' . $request->serach_text . '%');

            $posts = $query->get();


            return view('front.posts')->with('posts', $posts)->with('footers_menus', $footers_menus);
        }
    }
    public function convert_data()
    {
        $posts =   Post::query()->with('related')->has('related')->with('resorese')->has('resorese')->get();
        foreach ($posts as $p) {
            $p->last_seen_old = (int) round(Carbon::parse($p->last_seen)->format('Uu') / pow(10, 6 - 3));
            $p->save();
        }
    }

    // public function index(Request $request)
    // {
    //     $footers_menus = Menu::where('show', 1)->where('type', 'footer')->orderBy('created_at', 'acs')->get();

    //     $query = Post::query()->with('related')->has('related')->with('resorese')->has('resorese');

    //     $currentPage = (int)$request->input('offset', 0);

    //     if ($request->ajax()) {



    //         //  $currentPage = $request->input('offset', 1);
    //         // $offset = ($currentPage - 1) * 15;
    //         // dd($page);

    //         $query->when($request->post_type, function ($q) use ($request) {
    //             if ($request->post_type != 'all') {
    //                 return $q->where('ad_format', $request->post_type);
    //             }
    //         });
    //         $query->when($request->title, function ($q) use ($request) {
    //             if ($request->search_type == 'title') {
    //                 return    $q->where('title', 'like', '%' . $request->title . '%');
    //             } elseif ($request->search_type == 'landanig_page') {
    //                 return    $q->where('landanig_page', 'like', '%' . $request->title . '%');
    //             } elseif ($request->search_type == 'page_name') {

    //                 return   $q->where('page_name', 'like', '%' . $request->title . '%');
    //             }
    //         });
    //         $query->when($request->obj, function ($q) use ($request) {
    //             if ($request->country != 'obj') {
    //                 //  $q->whereIn('country','like','%'. json_decode($request->country).'%');
    //                 $result = $q->where(function ($query) use ($request) {

    //                     foreach ($request->obj as $keyword) {
    //                         $str = str_replace(' ', '_', $keyword);
    //                         $query->orWhere('button', 'LIKE', "%$keyword%")->orWhere('button', 'LIKE', "%$str%");
    //                     }
    //                 });
    //             }
    //         });

    //         $query->when($request->category, function ($q) use ($request) {
    //             if ($request->category != 'Category') {
    //                 return $q->where('category', 'like', '%' . $request->category . '%');
    //             }
    //         });
    //         $query->when($request->country, function ($q) use ($request) {
    //             if ($request->country != 'country') {
    //                 //  $q->whereIn('country','like','%'. json_decode($request->country).'%');
    //                 $result = $q->where(function ($query) use ($request) {
    //                     foreach ($request->country as $keyword) {
    //                         $query->orWhere('country', 'LIKE', "%$keyword%");
    //                     }
    //                 });
    //             }
    //         });

    //         $query->when($request->lang, function ($q) use ($request) {
    //             if ($request->lang != 'lang') {
    //                 //  $q->whereIn('country','like','%'. json_decode($request->country).'%');
    //                 $result = $q->where(function ($query) use ($request) {
    //                     foreach ($request->lang as $keyword) {
    //                         $query->orWhere('lang', 'LIKE', "%$keyword%");
    //                     }
    //                 });
    //             }
    //         });
    //         $query->when($request->enng, function ($q) use ($request) {
    //             if ($request->enng != 'undefined undefined') {

    //                 $longstring =  explode(" ", $request->enng);

    //                 $firstsection = $longstring[0];
    //                 $secandsection = $longstring[1];
    //                 $firstStringCharacter = substr($secandsection, 0, 1);
    //                 if ($firstStringCharacter == '>') {
    //                     $secands =     str_replace('>', '', $secandsection);
    //                     return $q->where($firstsection, '>=', (int)$secands);
    //                 } else {
    //                     $secand = explode("~", $secandsection);
    //                     $min = (int)$secand[0];
    //                     $max = (int)$secand[1];

    //                     return $q->whereBetween($firstsection, [$min, $max]);
    //                 }
    //             }
    //         });
    //         $query->when($request->min_max, function ($q) use ($request) {
    //             if ($request->min_max != 'undefined undefined~undefined') {
    //                 $longstring =  explode(" ", $request->min_max);
    //                 $firstsection = $longstring[0];
    //                 $secandsection = $longstring[1];
    //                 $secand = explode("~", $secandsection);
    //                 $min = (int)$secand[0];
    //                 $max = (int)$secand[1];
    //                 return $q->whereBetween($firstsection, [$min, $max]);
    //             }
    //         });
    //         $query->when($request->radioValue, function ($q) use ($request) {
    //             if ($request->radioValue != 'all') {
    //                 $data_old = Carbon::now()->subDays($request->radioValue)->format('Y-m-d');

    //                 $date_new = Carbon::now()->format('Y-m-d');

    //                 return $q->whereBetween('post_create', [$data_old, $date_new]);
    //             }
    //         });
    //         $query->when($request->daterange, function ($q) use ($request) {
    //             $start = date('m/d/Y', strtotime(Carbon::now()->startOfMonth()));
    //             $end = date('m/d/Y', strtotime(Carbon::now()));
    //             if ($request->daterange != $start . " - " . $end) {
    //                 $date =  explode(" - ", $request->daterange);
    //                 // dd($date[0],$date[1]);

    //                 $data_old = date("Y-m-d", strtotime($date[0]));
    //                 $date_new = date("Y-m-d", strtotime($date[1]));
    //                 //   dd($data_old,$date_new);
    //                 return $q->whereBetween('post_create', [$data_old, $date_new]);
    //             }
    //         });
    //         $query->when($request->post_type, function ($q) use ($request) {

    //             if ($request->post_type != 'all') {

    //                 return $q->where('ad_format', $request->post_type);
    //             }
    //         });

    //         $ajaxpost = $query->orderBy('updated_at', 'desc')->skip($currentPage  * 15)->take(15)->get();
    //         $count = $query->orderBy('updated_at', 'desc')->skip($currentPage   * 15)->take(15)->count();


    //         $view = view('data')->with('posts', $ajaxpost)->render();
    //         return response()->json(['html' => $view, 'count' => $count]);
    //     } else {

    //         $posts = $query->orderBy('updated_at', 'desc')->skip(0)->take(15)->get();
    //     }

    //     return view('front.posts')->with('posts', $posts->unique('post_id'))->with('footers_menus', $footers_menus);
    // }
    public function downaload($post_id)
    {
       
        $post = Post::with('resorese')->find($post_id);


        $foramt = $post->ad_format;
        if ($foramt == 'image') {
            $test =   public_path('uploads/' . $post->resorese->image);
            return Response::download($test);
        } else {
            $test =   public_path('uploads/' . $post->resorese->video);
            return Response::download($test);
        }
    }
    public function fillter_serach(Request $request, $page = null)
    {
        $posts = Post::with('resorese');

        if ($request->has('post_type') && $request->post_type != 'all') {
            $posts->where('ad_format', 'image');
        }

        $posts = $posts->paginate(6);
        //  dd($posts);

        if ($request->page == -2 && $request->ajax()) {

            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }


        session()->put('test', 'test');
        return view('data')->with('posts', $posts);
    }
    public function show_model(Request $request)
    {
        // dd($request);
        $post = Post::with(['resorese', 'related'])->find($request->id);
        return view('data_modal')->with('item', $post);
    }
    public function fetured_posts(Request $request)
    {
        $footers_menus = Menu::where('show', 1)->where('type', 'footer')->orderBy('created_at', 'acs')->get();

     


        return view('front.fetured')->with('footers_menus', $footers_menus);
    }
    public function aliproduct(Request $request)
    {
        //   $pro =AliExpressProduct::query()->take(10)->get();
        //   foreach($pro as $e){
        //       $e->delete();
        //   }
        //   dd('d');
        $products = AliExpressProduct::paginate(16);
        $cats = CategoryAli::get();
        // dd($products);
        return view('frontend.aliexpress.index', compact('products', 'cats'));
    }
    public function aliproduct_id(Request $request)
    {
        $product = AliExpressProduct::find($request->id);
        return view('frontend.aliexpress._product', compact('product'));
    }
}
