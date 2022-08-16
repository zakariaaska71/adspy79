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

class CatImport implements ToCollection { 
      public function collection(Collection $rows) { 

            foreach( $rows as $row){
                  foreach($row as $d){
                 
                        if($d != null){
                              $cat = new Category();
                              $cat->title = $d;
                              $cat->save();
                        }
                  }
             
            }
    }
}

