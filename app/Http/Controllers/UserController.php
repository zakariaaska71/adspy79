<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryListFacade;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Mail\UserMail;
use App\Notifications\ResetPasswordNotification;
class UserController extends Controller
{
/**
* Display a listing of the resource.
*Middleware
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$users = User::orderBy('id','DESC')->get();
return view('dashboard.users.index',compact('users'))
->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $countrys = CountryListFacade::getList();
    // $ss = CityListFacade::getList('ar');

$roles = Role::pluck('name','name')->all();
return view('dashboard.users.create',compact('roles','countrys'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function reset_get(){
    return view('auth.passwords.reset_password');
}
public function reset(Request $request)
{
    
    $user = DB::table('users')->where('email', $request->email)
        ->first();
        // dd($user);
        if(!$user){
            $user = DB::table('companies')->where('email', '=', $request->email)
            ->first();
        }
        // dd($user);
    //Check if the user exists
    if (!$user) {
        return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
    }

    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' =>rand(0000000000,9999999999),
        'created_at' => Carbon::now()
    ]);
    //Get the token just created above
    $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

    if ($this->sendResetEmail($request->email, $tokenData['token'])) {

        return redirect()->back()->with(['success'=>'A reset link has been sent to your email address.']);
    } else {
        return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
    }
}
public function submitResetPasswordForm(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required'
    ]);
    $token = (int)$request->token;
    // dd($token === 6673220161);
    $updatePassword = DB::table('password_resets')
        ->where('token',$token)
        ->first();
    if (!$updatePassword) {
        return back()->withInput()->with(['error' => trans('Invalid token!')]);
    }
    $user = User::where('email', $updatePassword['email'])->first();
    if ($user) {
        $user->update(['password' => Hash::make($request->password)]);
    }



    DB::table('password_resets')->where(['email' => $updatePassword['email']])->delete();

    return redirect('/login')->with(['success' => trans('Your password has been changed!')]);
}
public function show_restpp($token)
{
    return view('auth.passwords.forgetPasswordLink')->with('token',$token);
}
private function sendResetEmail($email, $token)
{
    //Retrieve the user from the database

    $user = User::where('email',$email)->first();
    //Generate, the password reset link. The token generated is embedded in the link
    $link = URL::to('/') . '/reset_new_password/' . $token ;
  
    try {
        
        $user->notify(new ResetPasswordNotification($link));
     
        return true;
    } catch (\Exception $e) {
    die($e);
        return false;
    }
}
public function register(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:password_confirmation',
        'roles' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        auth()->login($user, true);

        return redirect()->route('chose_payment');
}
public  function chose_payment()
{
    return view('chose_payment')->with(['success'=>'Choose your payment method']);
}
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'roles' => 'required',
]);
$input = $request->all();
$input['password'] = Hash::make($input['password']);
$user = User::create($input);
$user->assignRole($request->input('roles'));
return redirect()->route('users.index')
->with('success','User created successfully');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $countrys = CountryListFacade::getList('en');

$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();
return view('dashboard.users.edit',compact('user','roles','userRole','countrys'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $user = User::find($id);
$request->validate([
    'name' => 'required',
    // 'email'=>'required|email|unique:users,email,'.$user->id,
    'email'=> 'required|email|unique:users,' . $id,

    'roles' => 'required',
    'country'=>'required'
]);
$request_all = $request->except(['password','roles']);
if($request->password != null){
$request_all['password'] = Hash::make($request->password);
}
$request_all['role_ids']=[$request->roles];




$user->save();
// dd($user->roles);
// dd($user->role_ids);
$user->roles()->detach();

$user->assignRole($request->roles);
return redirect()->route('users.index')
->with('success','User updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
User::find($id)->delete();
return redirect()->route('users.index')
->with('success','User deleted successfully');
}

public function logout(){
    Auth::logout();
    return redirect()->route('home');
}
}