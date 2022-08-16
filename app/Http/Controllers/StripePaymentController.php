<?php
   
namespace App\Http\Controllers;

use App\Paid;
use App\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        dd(auth()->user());
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $price =1;
        
      $stripe=  Stripe\Charge::create ([
                "amount" => $price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
        $paid  = new Paid();
        $user = auth()->user();
        $user->paid = 1;
        $user->first_day =  Carbon::now()->toDateTimeString();
        $user->finish_day =  Carbon::now()->addDays(2)->toDateTimeString();
        $user->is_trial = 1;
        $user->save();
        $paid->user_id = 1;
        $paid->amount =   $price;
        $paid->stripeToken = $request->stripeToken;
        $paid->status = $stripe['status'];
        $paid->paypal_payer = null;
        $paid->payment_method ='stripe';
        $paid->save();
  
        
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}