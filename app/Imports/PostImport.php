<?php

namespace App\Imports;

use App\Category;
use App\Post;
use App\Postrelated;
use App\Resoure;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use DB;

class PostImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach ($rows as $key => $row) {
        
            if ($key == 0 || $key == 1) {
                continue;
            }

            if (strlen($row[7]) < 10) {
                $row[7] = str_replace('/21', '-2021', $row[7]);
                $row[7] = str_replace('/', '-', $row[7]);
            }
            if (strlen($row[8]) < 10) {
                $row[8] = str_replace('/21', '-2021', $row[8]);
                $row[8] = str_replace('/', '-', $row[8]);
            }
          
            
            $last = substr($row[6], -1);
            if($last == '/'){
             $testt=   substr($row[6], 0, -1);
           $test = substr(strrchr($testt, '/'), 1);
            }else{
                 $testt =    substr(strrchr($row[6], '/'), 1);
            $test =  str_replace('/', '', $testt); 
            }
          
            $newpost = Post::where('post_id', (int)$test)->Orwhere('post_id',(string)$test)->first();
            
            if ($newpost) {

                $related = new  Postrelated();
                $related->post_id = $newpost->id;
                $related->share = (int)$row[18];
                $related->comment = (int)$row[19];
                $related->like = (int)$row[20];
                $related->last_seen = $row[8];
                $newpost->last_seen = $row[8];
                $arraydddd =[];
                if($newpost->interested == null){
                    $newpost->interested = $row[9];
                }

                $newpost->last_seen_old = (int) round(Carbon::parse($row[8])->format('Uu') / pow(10, 6 - 3));
                $array = [];
         

               $arrayanew_count = [];
               if($newpost->country_new){
                foreach($newpost->country_new as $s){
                    array_push($arrayanew_count,$s);
                }
                array_push($arrayanew_count,$row[13]); 
               $newpost->country_new= $arrayanew_count; 
               }

               $arrayanew_counte = [];
               if($newpost->country_seen_new){
                foreach($newpost->country_seen_new as $s){
                    array_push($arrayanew_counte,$s);
                }
                array_push($arrayanew_counte,$row[12]); 
               $newpost->country_seen_new= $arrayanew_counte; 
               }
          
          


                $related->save();
                $newpost->save();
                if($row[27] != null){
                      $cats = explode(",", $row[27]);
                $arr=[];
                foreach($cats as $cat){
                    array_push($arr,$cat);
                }
                $newpost->category= json_encode($arr);
                $newpost->save();  
                }else{
                 $newpost->category = json_encode(["uncategory"]);
                 $newpost->save(); 
                }
            
                continue;
            }


              $video = null;
                if ($row[4]) {

                    try {

                        $video = null;
                        $cover = file_get_contents($row[4]);

                        $name_cover = substr($cover, strrpos($cover, '/') + 1);

                        $video = '/' . rand(0, 1000000000) . '.mp4';

                        Storage::put($video, $cover);
                    } catch (\Exception $e) {
                     if($row[2] == "video"){
                    continue;
                     }
                }
                }
          
            $image = null;


            if ($row[5]) {
                try {


                    $cover = file_get_contents($row[5]);

                    $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);

                    $image = rand(0, 100000000000000) . '.jpg';

                    Storage::put($image, $cover);
                } catch (\Exception $e) {
                   if($row[2] == "image"){
                    continue;
                     }
                }
            }

            if ($row[22]) {
                try {


                    $cover = file_get_contents($row[22]);

                    $name_cover = substr($cover, strrpos($cover, '/upload/cover/') + 1);

                    $fb_page_logo = rand(0, 100000000000000) . '.jpg';

                    Storage::put($fb_page_logo, $cover);
                } catch (\Exception $e) {
                    continue;
                }
            }


            $post = new Post();

            $post->page_id = $row[0];
            $post->post_id = (int)$test;
            $post->ad_format    = $row[2];
            $post->landanig_page = $row[3];
            $post->post_link = $row[6];
            $post->post_create = $row[7]  ?? '2020-10-10';
            $test1 =  Str::afterLast($row[8], '/');
            $link2 =  Str::replaceFirst($test1, '20' . $test1, $row[8]);
            $row8 = str_replace('/', '-', $link2);
            $post->last_seen = $row[8];
            $post->interested = $row[9];
            $arrayddd =[];
            if($row[9] != null){
                array_push($arrayddd,$row[9]);
                $post->interesteded = $row[9];
            }
            $post->gender = $row[10];
            $post->age = $row[11];
            $post->country = $row[12];
            $post->lang = $row[15];
            $post->country_see_in = $row[13];
            $aaarrr =[];
            $aaarrree =[];
            array_push($aaarrr,$row[13]);
            array_push($aaarrree,$row[12]);
            $post->country_seen_new = $aaarrree;
            $post->country_new = $aaarrr;
            
            $post->t_lang = $row[14];
            $post->page_link = $row[16];
            $post->button = $row[17];
            if ($row[18] != null) {
                $post->share = (int)$row[18];
            } else {
                $post->share = 0;
            }
            if ($row[19] != null) {
                $post->comment = (int)$row[19];
            } else {
                $post->comment = 0;
            }
            if ($row[20] != null) {
                $post->like = (int)$row[20];
            } else {
                $post->like = 0;
            }
            $post->page_name = $row[21];
            $post->Ad_Description = $row[23];
            $post->title = $row[24];
            $post->category = null;
            $resorese = (object)[];
            $resorese->video = $video;
            $resorese->image = $image;
            $resorese->page_logo = $fb_page_logo;
            $post->resource = $resorese;
            $post->save();
            $post->last_seen_old = (int) round(Carbon::parse($row[8])->format('Uu') / pow(10, 6 - 3)); 
            if($post-> post_id == 0){
                $post->delete();
                    continue;

            }

            $res = new Resoure();
            $res->post_id = $post->id;
            $res->video = $video;
            $res->image = $image;
            $res->page_logo = $fb_page_logo;
            $res->save();

          


            $post_r = new Postrelated();
            $post_r->post_id = $post->id;
            $post_r->share = (int)$row[18];
            $post_r->like = (int)$row[20];
            $post_r->comment = (int)$row[19];
            $post_r->last_seen = $row[8];
            $post_r->save();
               if($row[27] != null){
                      $cats = explode(",", $row[27]);
                $arr=[];
                foreach($cats as $cat){
                    array_push($arr,$cat);
                }
                $post->category= json_encode($arr);
                $post->save();  
                }else{
                 $post->category = json_encode(["uncategory"]);
                 $post->save(); 
                }
   
        }
    }
}
