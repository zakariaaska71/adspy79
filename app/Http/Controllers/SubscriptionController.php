<?php
namespace App\Http\Controllers;
// require_once('../vendor/autoload.php');
use App\Http\Controllers\Controller;
use App\User;
use App\Price;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Cashier;
use \Stripe\Stripe;
class SubscriptionController extends Controller {
    
    
    
//     public function __construct() {
//        $this->middleware('auth');
//    }
   public function retrievePlans() {
       $key = \config('services.stripe.secret');
       $stripe = new \Stripe\StripeClient($key);
       $plansraw = $stripe->plans->all();

       $plans = $plansraw->data;
       
       foreach($plans as $plan) {
           $prod = $stripe->products->retrieve(
               $plan->product,[]
           );
           $plan->product = $prod;
       }
       return $plans;
    
   }
   public function sub_plans()
   {
    $key = \config('services.stripe.secret');
    $stripe = new \Stripe\StripeClient($key);
    $plansraw = $stripe->plans->all();

    $plans = $plansraw->data;
    
    foreach($plans as $plan) {
        $prod = $stripe->products->retrieve(
            $plan->product,[]
        );
        $plan->product = $prod;
    }
    return view('front.sub')->with('user',auth()->user())->with('plans',$plans);
   }
   public function create_checkout(Request $request)
   {
       dd($request);
    $key = \config('services.stripe.secret');
    \Stripe\Stripe::setApiKey($key);
    $session = \Stripe\Checkout\Session::create([
        'success_url' => 'https://example.com/success.html',
        'cancel_url' => 'https://example.com/canceled.html',
        'mode' => 'subscription',
        'line_items' => [[
          'price' => $request->plan,
          // For metered billing, do not pass quantity
          'quantity' => 1,
        ]],
      ]);
      return $session->url;
   }
   public function showSubscription() {
       $plans = $this->retrievePlans();
       $user = Auth::user();
    //   dd($plans);

    //    return view('front.profile', [
    //        'user'=>$user,
    //        'intent' => $user->createSetupIntent(),
    //        'plans' => $plans
    //    ]);
        return view('stripe.paid', [
           'user'=>$user,
           'intent' => $user->createSetupIntent(),
           'plans' => $plans
       ]);
   }
   public function subs(Request $request){
    auth::user()->subscribed('Trial');
   }
   public function processSubscription(Request $request)
   {    

       $user = Auth::user();
       $paymentMethod = $request->input('payment_method');
       $user->createOrGetStripeCustomer();
       $user->addPaymentMethod($paymentMethod);
       $plan = $request->input('plan');
       $trial_day = $request->input('trialdaye');
            $key = \config('services.stripe.secret');

      
       try {
           if($trial_day != null){
            $user->newSubscription($request->plan_name, $plan) ->trialDays(2)->create($paymentMethod, [
                'email' => $user->email
            ]);
           }else{
            $user->newSubscription($request->plan_name, $plan)->create($paymentMethod, [
                'email' => $user->email
            ]);
           }
           
           
       } catch (\Exception $e) {
          
           return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
       }
       
         return redirect()->route('user.profile')->with(['success'=>'Plan Subscripe Successfully']);
   }
   public function get_all_subscription($id){
       $subscriptions  = User::find($id)->subscriptions()->get();
    
    // dd($subscriptions);
//    dd( User::find($id)->subscribed('name'));

    // $subscription = Subscription::where('name', 'default')->where('user_id', auth()->id())->first();
    // $subscription->cancel();
    // dd($subscriptions);
       return view('dashboard.users.subscription')->with('subs',$subscriptions);
   }
   public function cancel($id,$stripe_id){
       $user = User::find($id)->subscriptions()->where('stripe_id',$stripe_id)->active()->first();
       $user->cancelNow();
       return redirect()->back()->with(['success'=>'canceled Successfully']);
        
}
    public function return_form_to_paid(Request $request){
        $plan = (json_decode($request->id));
        return view('front.paid_model')->with('plan',$plan)->with('intent',Auth::user()->createSetupIntent());
    }
    public function paymet_page(Request $request){
        $plan = Price::where('paln_id',$request->plan)->first();
        return view('front.paid_model')->with('plan',$plan)->with('intent',Auth::user()->createSetupIntent());
    }
    public  function calncel_plan(Request $request)
    {
        $subscription = auth()->user()->subscriptions()->where('stripe_id',$request->stripe_id)->active()->first(); // getting all the active subscriptions 
        $subscription->cancelNow ();
      return redirect()->back()->with(['success'=>'Your Plan Cancel']);
        
    }
}
