<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AliproductId;
use Illuminate\Http\Request;
use App\AliExpressProduct;
use App\AliCategory;
use App\AliDaily;
class DailyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aliupdate:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update aliexpress product daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $products = AliExpressProduct::get();
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
      
        if($pro->totalStock == @$product->totalStock && $pro->totalOrders == @$product->totalOrders && $pro->wishlistCount == @$product->wishlistCount &&  $pro->total_review == @$product->reviewsRatings->totalCount){
              continue;
        }
        else{
        $daily = new AliDaily();
        $daily->product_id = $pro->id;
        $daily->totalStock = @$product->totalStock;
        $daily->totalOrders = $product->totalOrders;
        $daily->wishlistCount = $product->wishlistCount;
        $daily->total_review=$product->reviewsRatings->totalCount;
        $daily->save();
        }
        
        }
                $this->info('All Product Updated');

    }
}
