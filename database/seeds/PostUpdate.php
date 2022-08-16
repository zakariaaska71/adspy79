<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostUpdate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::query()->where('is_fetured', 1)->with('related')->has('related')->with('resorese')->has('resorese')->chunk(1000,function($posts){
            foreach($posts as $data){
                $array = [];
                $array_new = [];
                array_push($array,$data->country);
                array_push($array_new,$data->country_see_in);
                $data->country_seen_new = $array;
                $data->country_new = $array_new;
                $data->save();
            }
        });
    }
}
