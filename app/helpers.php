<?php

use App\General;
use App\LikePost;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

if (!function_exists('conert_k')) {
    function conert_k($cont)
    {
        $count = $cont;

        if ($count >= 1000) {
            return round($count / 1000, 1) . "k";
        } else {
            return $count;
        }
    }
}
if ( ! function_exists('put_permanent_env'))
{
    function put_permanent_env( $type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
            Artisan::call('cache:clear');
        }
   

    }
}
if (!function_exists('check_pro')) {
    function check_pro()
    {
        if(auth()->check()){
            if (auth()->user()->hasRole('admin')) {
                return 1;
            }
        }
       
        if (!auth()->check()) {
            return 1;
        } else {
            if (auth()->user()->subscriptions()->where('name', 'Pro')->active()->first()  != null) {
                return 1;
            } else {
                return 0;
            }
            return 0;
        }
    }
}
if (!function_exists('check_standard')) {
    function check_standard()
    {
        if(auth()->check()){
            if (auth()->user()->hasRole('admin')) {
                return 1;
            }
        }
        if (!auth()->check()) {
            return 1;
        } else {
            if (auth()->user()->subscriptions()->where('name', 'Pro')->active()->first()  != null  || auth()->user()->subscriptions()->where('name', 'Statndrd')->active()->first()  != null) {
                return 1;
            } else {
                return 0;
            }
            return 0;
        }
    }
}
if (!function_exists('check_basic')) {
    function check_basic()
    {
        if(auth()->check()){
            if (auth()->user()->hasRole('admin')) {
                return 1;
            }
        }
        if (!auth()->check()) {
            return 1;
        } else {
            if (auth()->user()->subscriptions()->where('name', 'Basic')->active()->first()  != null  || auth()->user()->subscriptions()->where('name', 'Pro')->active()->first()  != null  || auth()->user()->subscriptions()->where('name', 'Statndrd')->active()->first()  != null) {
                return 1;
            } else {
                return 0;
            }
            return 0;
        }
    }
}

if (!function_exists('renderStarRating')) {
    function renderStarRating($rating, $maxRating = 5)
    {
        $fullStar = " <li><i class='fas fa-star '></i></li>";
        $halfStar = "<li><i class='fas fa-star-half'></i></i></li>";
        $emptyStar = "<li><i class = 'far fa-star'></i><li>";

        $rating = $rating <= $maxRating ? $rating : $maxRating;

        $fullStarCount = (int)$rating;
        $halfStarCount = ceil($rating) - $fullStarCount;
        $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

        $html = str_repeat($fullStar, $fullStarCount);
        $html .= str_repeat($halfStar, $halfStarCount);
        $html .= str_repeat($emptyStar, $emptyStarCount);
        echo $html;
    }
}


if (!function_exists('general')) {
    function general($item)
    {
        $general = General::first()->$item;
        return $general;
    }
}
if (!function_exists('postlike')) {
    function postlike($post_id)
    {
        if (auth()->user()->hasRole('admin')) {
            $post = Post::find($post_id);
            if($post->is_fetured == 1){
                return 'fas';
            }else{
                return 'far'; 
            }
        }
        $like = LikePost::where('user_id', Auth::id())->where('post_id', $post_id)->first();
        if ($like) {
            return 'fas';
        } else {
            return 'far';
        }
    }
}
if (!function_exists('get_date')) {
    function get_date()
    {
        $start = date('m/d/Y', strtotime(Carbon::now()->startOfMonth()));
        $end = date('m/d/Y', strtotime(Carbon::now()));
        // dd($start." - ".$end);


        return $start . " - " . $end;
    }
}
function dicount_price($price, $decount)
{
    $data =   $price - ($price * $decount / 100);
    return $data;
}
