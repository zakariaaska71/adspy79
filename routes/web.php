<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\UpdatePost;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@frontend');

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
Route::post('user-register','UserController@register')->name('user-register');
Route::get('chose_payment','UserController@chose_payment')->name('chose_payment');
Route::get('retrr','HomeController@retrr');
Route::get('update_posts','HomeController@update_posts');
Route::get('worwide', 'HomeController@worwide');
Route::get('reset_new_password/{token}','UserController@show_restpp');
Route::post('reset-password', 'UserController@submitResetPasswordForm')->name('reset.password.post');
Route::get('reset_password','UserController@reset_get')->name('get_rest');
Route::post('reset_password_without_token', 'UserController@reset');
Route::get('test_update', function () {

    $posts =  Post::chunk(50,function($data){
        dispatch(new UpdatePost($data));
    });
   

    dd('sent');
});
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'admin_user'], function() {
    Route::get('/',function(){
        return view('dashboard.index');
    })->name('index.dashboard');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('general', 'GeneralController');
    Route::resource('menu', 'MenuController');
    Route::get('social', 'GeneralController@social');
    Route::resource('first_section', 'FirstController');
    Route::resource('video_section', 'VideoController');
    Route::resource('about_section', 'AboutController');
    Route::resource('page', 'PageController');
    Route::resource('aliexpress', 'AliproductIdController');
    Route::get('aliexpress_get_products','AliproductIdController@get_products')->name('get_products');
        Route::get('change_category','PostController@change_category')->name('change_category');

        Route::get('get_mail_setting','GeneralController@get_mail_setting' )->name('get_mail_setting');
        Route::post('env_key_update','GeneralController@env_key_update' )->name('env_key_update.update');


    

    Route::resource('section3', 'SectionthreeController');
    Route::get('section','SectiononeController@index')->name('section.index');
    Route::post('section','SectiononeController@store')->name('section.store');
     Route::delete('delete-multi-post','PostController@delete_post')->name('delete-multiple-post');

    Route::resource('product', 'ProductController');
    Route::resource('price', 'PriceController');
    Route::resource('blog', 'BlogController');

    Route::get('contact_section','ContactController@index')->name('contact_section.index');
    Route::post('contact_section','ContactController@store')->name('contact_section.store');
    Route::post('return_form_to_paid','SubscriptionController@return_form_to_paid')->name('return_form_to_paid')->middleware('check_paid');;

    
    Route::get('updated_pages','PageController@update_status')->name('page.update.status');
    Route::get('update_product_status', 'ProductController@update_status')->name('product.update.status');
    Route::get('update_price_status', 'PriceController@update_status')->name('price.update.status');
    Route::get('update_blog_status', 'BlogController@update_status')->name('blog.update.status');
    Route::get('post_special_status', 'PostController@post_special_status')->name('post.update.special');
    Route::get('update_menu_status', 'MenuController@update_status')->name('menu.update.status');

    
    Route::resource('posts','PostController');

    
    
    
    Route::get('social', 'GeneralController@social');
    });

    Route::get('/get_palne', 'SubscriptionController@retrievePlans');

    Route::get('/get_subscripe', 'SubscriptionController@showSubscription')->middleware('check_paid');;
      Route::post('/subscribe', 'SubscriptionController@processSubscription')->middleware('check_paid');;
      // welcome page only for subscribed users
      Route::post('seller/subscribe', 'SubscriptionController@processSubscription')->middleware('check_paid');;
      Route::get('show_subs/{id}', 'SubscriptionController@get_all_subscription')->name('show_subs')->middleware('check_paid');;
      Route::get('cancel/{user_id}/{id}', 'SubscriptionController@cancel')->name('cancel');
      Route::get('paymet_page','SubscriptionController@paymet_page')->name('paymet_page')->middleware('check_paid');
      Route::post('calncel_plan','SubscriptionController@calncel_plan')->name('calncel_plan');
      Route::get('likes','HomeController@likes')->name('likes')->middleware('check_paid');
      Route::get('new_likes','HomeController@likes_now')->name('likes_now')->middleware('check_paid');
      Route::get('new_index','HomeController@new_index')->name('new_index');
      Route::get('new_fetured','HomeController@new_fetured')->name('new_fetured');

      
Route::get('/home', 'HomeController@index')->name('home');

Route::get('export', 'UploadController@export')->name('export');
Route::get('importExportView', 'UploadController@importExportView');
Route::get('importExportViewali', 'UploadController@importExportViewali');

Route::get('importExportViewcats', 'UploadController@importExportViewcats');
Route::get('importExportViewproducts', 'UploadController@importExportViewproduct');

Route::post('importcats', 'UploadController@importcats')->name('importcats');
Route::post('importproducts', 'UploadController@importproducts')->name('importproducts');
Route::post('newail', 'UploadController@importproductsali')->name('newail');

Route::post('show_model', 'HomeController@show_model')->name('showpostModal');

Route::get('sub_plans', 'SubscriptionController@sub_plans');
Route::post('create-checkout-session', 'SubscriptionController@create_checkout');

Route::post('import', 'UploadController@import')->name('import');

Route::post('test_form','HomeController@test_form')->name('test_form');

Route::get('posts','HomeController@index')->name('post_index');

Route::get('aliexpress', 'HomeController@aliproduct')->name('aliproduct')->middleware('check_paid');
Route::post('aliexpress_id', 'HomeController@aliproduct_id')->name('show_ali_product');

Route::get('products','HomeController@products')->name('productgs_index');

Route::get('blogs','HomeController@blogs')->name('blogs.front');

// Route::get('index2','HomeController@index2')->name('post_index2');

Route::get('fillter_serach','HomeController@fillter_serach')->name('fillter_serach');
Route::get('blog/{slug}','HomeController@blog')->name('blog.single');
Route::get('pages/{id}','HomeController@page')->name('page.page');

Route::post('search_form','HomeController@search_form')->name('search_form');

Route::get('dawnload-resoures/{post_id}','HomeController@downaload')->name('dawnload.post');
Route::post('like_post','HomeController@like_post')->name('like_post');
Route::get('logout-user','UserController@logout')->name('logout_user');

Route::get('featured','HomeController@fetured_posts')->name('featured_post');
Route::get('aliexpress', 'HomeController@aliproduct')->name('aliproduct');
Route::get('profile','HomeController@profile')->name('user.profile')->middleware('check_paid');
Route::post('update-profile','HomeController@user_update')->name('user.uppdate_profile');
Route::get('get_search','HomeController@get_search')->name('get_search');
Route::get('count','HomeController@count');
Route::post('product_show', 'HomeController@productid')->name('showproductModal');

