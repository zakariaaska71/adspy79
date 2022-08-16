<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function change_category(Request $request){
        $post = Post::find($request->id);
        $array=[];
        foreach($request->value as $val){
            array_push($array,$val);
        }
        $post->category = json_encode($array);
        $post->save();
        return response()->json(['status'=>true]);
    }
    public function index(Request $request)
    {
        $query = Post::query()->with('related')->has('related')->with('resorese')->has('resorese');
       
           $query->when($request->post_id, function ($q) use ($request) {
                return $q->where('post_id',(int)$request->post_id);
                
            
            });
            $query->when($request->page_name, function ($q) use ($request) {
                return $q->where('page_name','like','%'.$request->page_name.'%');
            
            });
             $query->when($request->post_create, function ($q) use ($request) {
                           $date_new = date("Y-m-d", strtotime($request->post_create));

                return $q->where('post_create', $date_new);
            
            });
             $query->when($request->last_seen, function ($q) use ($request) {
                           $date_new = date("Y-m-d", strtotime($request->last_seen));

                return $q->where('last_seen', $date_new);
            
            });
              $query->when($request->category, function ($q) use ($request) {
                  if($request->category == 'Empty'){
                            return $q->where('category','like','%'.'uncategory'.'%');
                  }else{
                                      return $q->where('category','like','%'.$request->category.'%');

                  }

            
            });
            $query->when($request->country, function ($q) use ($request) {
                

            return $q->where('country_new','like', $request->country);
        
        });
        $query->when($request->country_seen_in, function ($q) use ($request) {
                

            return $q->where('country_seen_new','like', $request->country_seen_in);
        
        });
            
            
               $query->when($request->gender, function ($q) use ($request) {
                          if($request->gender =='All'){
                       return $q->where('gender', 'like','%'.'Males and Females'.'%');
                          }elseif($request->gender =='Males'){
                             return $q->where('gender', 'like','Males');
                          }
                          elseif($request->gender =='Females'){
                             return $q->where('gender', 'like','Females');
                          }
                          elseif($request->gender == 'empty'){
                             return $q->where('gender',null);
                          }
            });
            $query->when($request->age, function ($q) use ($request) {
                          if($request->age =='empty'){
                       return $q->where('age', null);
                          }elseif($request->age == 'notempty'){
                                                     return $q->where('age','!=', null);

                          }
            });
            
            
            $posts = $query->orderBy('created_at', 'DESC')->paginate(25);


           
            
            
        return view('dashboard.post.index', compact('posts','request'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create');
    }
    public function post_special_status(Request $request){
        $post = Post::find($request->post_id);
        $post->special = $request->special;
        $post->save();
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function delete_post(Request $request){
    $ids = $request->ids;
   $pp= Post::whereIn('_id',explode(",",$ids))->get();
    foreach($pp as $post){
        $filename=public_path('uploads/' . $post->resorese->image);
        if($post->ad_format == 'video'){
            $videos=public_path('uploads/' . $post->resorese->video);
            unlink($videos);
        }
        unlink($filename);
        $post->delete();
    }

    return response()->json(['status'=>true,'message'=>"Post deleted successfully."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post  = Post::find($id);
       
        return view('dashboard.post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
    //  dd($request);

        $request_all = $request->except(['image','video','page_logo','category','country_seen_new','country_new']);
        $request_all['country_seen_new'] = json_decode($request->country_seen_new);
        $request_all['country_new'] = json_decode($request->country_new);
        $post->update($request_all);
        $requestt= [];
        if($request->image != null){
            $requestt['image'] = $request->image->store('post_image');
        }
        if($request->page_logo != null){
            $requestt['page_logo'] = $request->page_logo->store('post_image');
        }
        if($request->video != null){
            try{
            $cover = file_get_contents( $request->video );
            
            $name_cover = substr($cover, strrpos($cover, '/upload/') + 1);
              
            $video = '/'.rand(0,1000000000).'.mp4';
          
            Storage::put($video, $cover);
            $requestt['video'] = $video;
        }catch (\Exception $e) {
           dd($e);
        } 
        }
        $array=[];
        if($request->category != null){
            foreach($request->category as $val){
                array_push($array,$val);
            }
            $post->category = json_encode($array);    
        }
     
        $postr = $post->resorese();

        $post->save();
        $postr->update($requestt);
        return redirect()->back()->with(['success'=>'edit']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $filename=public_path('uploads/' . $post->resorese->image);
        if($post->ad_format == 'video'){
            $videos=public_path('uploads/' . $post->resorese->video);
            unlink($videos);
        }
        unlink($filename);
        $post->delete();
    
        return redirect()->back()->with(['success'=>'Post deleted successfully']);
    }
}
