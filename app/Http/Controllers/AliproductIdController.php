<?php

namespace App\Http\Controllers;

use App\AliproductId;
use Illuminate\Http\Request;
use App\AliExpressProduct;
use App\AliCategory;
use App\AliDaily;
class AliproductIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(AliExpressProduct::truncate());
        return view('dashboard.aliexpress.create')->with('products',AliproductId::orderBy('id', 'DESC')->where('convert',0)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.aliexpress.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $headers = [
            'Content-Type' => 'application/json',
            'x-api-key' => '0lSCqVWRM35VX1DA892lUaTbanVNhptQ9VYV3h6M',
        ];
        $client = new \GuzzleHttp\Client([
            'headers' => $headers
        ]);
       
        
        $r = $client->request('POST', 'https://api.zapiex.com/v3/search', [
            'json' => ['text' => $request->title]
        ]);
        $res = json_decode($r->getBody()->getContents());
        if(count($res->data->items) > 0){
            
        
        foreach($res->data->items as $item){
       
            if($item->totalOrders >= $request->total){
                
           $pro = AliproductId::where('product_id',$item->productId)->first();
           if($pro){
                continue; 
           }else{
               $pro = new AliproductId();
               $pro ->product_id = $item->productId;
               $pro ->convert = 0;
               $pro ->is_drow = 0;
               $pro->save();
           }

           
        }else
               continue; 
        }
        return redirect()->back()->with(['success'=>'تم استخراج بنجاح']);

        
        } 
        return redirect()->back()->with(['error'=>'لم يتم العثور على اي منتج']);

    }
    public function get_products(){
      $products = AliproductId::where('convert',0)->get() ;
      foreach($products as $pro){
          $headers = [
            'Content-Type' => 'application/json',
            'x-api-key' => '0lSCqVWRM35VX1DA892lUaTbanVNhptQ9VYV3h6M',
        ];
        $client = new \GuzzleHttp\Client([
            'headers' => $headers
        ]);
       
        
        $r = $client->request('POST', 'https://api.zapiex.com/v3/product/details', [
            'json' => ['productId' => $pro->product_id,'getShipping'=>true]
        ]);
        $res = json_decode($r->getBody()->getContents());
        $product = $res->data;

        $new = new AliExpressProduct();
        $new->product_id= $pro->product_id;
        $new->title = $product->title;
        
        $new->productUrl = $product->productUrl;
        $new->totalStock = @$product->totalStock;
        $new->totalOrders = $product->totalOrders;
        $new->wishlistCount = $product->wishlistCount;
        $new->total_review=$product->reviewsRatings->totalCount;
        $new->avarage_review=$product->reviewsRatings->averageRating;
        $new->images=$product->productImages;
        $new->is_single_price = $product->hasSinglePrice;
        
        if($new->is_single_price == true){
        $new->is_descount = @$product->price->web->hasDiscount;
        if($new->is_descount == true){
          $new->discount_value=  @$product->price->web->discountPercentage;
        }
        $new->price = @$product->price->web->originalPrice->value;
        }elseif($new->is_single_price == false){
        $new->min_price = @$product->priceSummary->web->originalPrice->min->value;
        $new->max_price = @$product->priceSummary->web->originalPrice->max->value;
         $new->is_descount = @$product->priceSummary->web->hasDiscount;
        if($new->is_descount == true){
          $new->discount_value=  @$product->priceSummary->web->discountPercentage;
        }
        }
        $new->save();
        $daily = new AliDaily();
        $daily->product_id = $new->id;
        $daily->totalStock = @$new->totalStock;
        $daily->totalOrders = $new->totalOrders;
        $daily->wishlistCount = $new->wishlistCount;
        $daily->total_review=$new->totalCount;
        $daily->save();
       $collection=$res->data->productCategory->path;
       $numItems = count($collection);
    //   dd($numItems);
       
        $i = 0;
        
        foreach($collection as $catr){
            if(++$i === $numItems) {
   
 
            $cat = new AliCategory();
            $cat->product_id = $new->id;
            $cat->category_id  = $catr->id;
            $cat->name  = $catr->name;
            $cat->save();
            }
       
        }
        $pro->convert =1;
        $pro->save();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AliproductId  $aliproductId
     * @return \Illuminate\Http\Response
     */
    public function show(AliproductId $aliproductId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AliproductId  $aliproductId
     * @return \Illuminate\Http\Response
     */
    public function edit(AliproductId $aliproductId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AliproductId  $aliproductId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AliproductId $aliproductId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AliproductId  $aliproductId
     * @return \Illuminate\Http\Response
     */
    public function destroy(AliproductId $aliproductId)
    {
        //
    }
}
