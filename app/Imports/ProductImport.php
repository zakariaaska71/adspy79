<?php

namespace App\Imports;

use App\Productnew;
use App\Post;
use App\Postrelated;
use App\Resoure;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use DB;
use Intervention\Image\Facades\Image;

class ProductImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Productnew::truncate();
        foreach ($rows as $key => $row) {
            if ($key == 0 || $row[1] == null) {
                continue;
            }
            $row[3] = str_replace('/21', '-2021', $row[3]);
            $row[3] = str_replace('/', '-', $row[3]);


            // dd($row);
         
            $product = new Productnew();
            $product->category = $row[0];
            $product->title = $row[1];
            $product->decs = $row[2];
            $product->post_on = $row[3];
            $product->selling_price = $row[4];
            $product->cost = $row[5];
            $product->margin = $row[6];
            $product->cpa = $row[7];
            $product->net = $row[8];
            $product->source = $row[9];
            $product->as_seen_on = $row[10];
            $product->orders = $row[11];
            $product->review = $row[12];
            $product->no_of_stores_selling_it = $row[13];
            $product->liks = $row[14];
            $product->comment = $row[15];
            $product->share = $row[16];
            $product->reaction = $row[17];
            $product->aliexpress_supplier = $row[18];
            $product->alibaba = $row[19];
            $product->amazon = $row[20];
            $product->ebay = $row[21];
            $product->store_selling_this_item =str_replace('https://nullrefer.com/?','',$row[22]) ;
            $product->facebook_ad = $row[23];
            if ($row[24]) {
                try {
                    $cover = file_get_contents($row[4]);
                    $name_cover = substr($cover, strrpos($cover, '/') + 1);
                    $product->video = '/productVideo/' . rand(0, 1000000000) . '.mp4';
                    Storage::put($product->video, $cover);
                } catch (\Exception $e) {
                    $product->video = null;
                }
            }
            $product->facebook_ad = $row[23];
            $product->country = $row[25];
            $product->gender = $row[26];
            $product->age_range = $row[27];
            $product->audience_size = $row[28];
            $product->interests = $row[29];
            if ($row[30]) {
                $array = [];
                $ex = explode(',', $row[30]);
                foreach ($ex as $key =>$imm) {
                  
                  $image=  str_replace(' ','',$imm);
                    try {
                        $cover = file_get_contents($image);
                        $name_cover = substr($cover, strrpos($cover, '/') + 1);
                        $im = rand(0, 1000000000) . '.jpg';
                        Storage::put($im, $cover);

                        $destinationPath = public_path('uploads/productImage');
                   
                        $input['imagename'] = time().'.'.$im;
                        

                        $img = Image::make($cover);

                        $img->resize(null, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath.'/'.$input['imagename']);
                        array_push($array, $input['imagename']);
                            
                            



                    } catch (\Exception $e) {
                       dd($e);
                        continue;
                    }
                }
            }
            // dd($array);
            $product->images = $array;
            $product->save();
        }
    }
}
