<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
use DB;
class RoleController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
// function __construct()
// {
// $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
// $this->middleware('permission:role-create', ['only' => ['create','store']]);
// $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
// $this->middleware('permission:role-delete', ['only' => ['destroy']]);
// }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$roles = Role::orderBy('_id','DESC')->paginate(5);

return view('dashboard.roles.index',compact('roles'))
->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$permission = Permission::get();


return view('dashboard.roles.create',compact('permission'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required|unique:roles,name',
'permission' => 'required',
]);

$role = Role::create(['name' => $request->input('name')]);
$role->syncPermissions($request->input('permission'));
foreach($request->input('permission') as $s){
    $permission=Permission::where('name',$s)->first()->id;
    $data=array('permission_id'=>$permission,"role_id"=>$role->id);
DB::table('role_has_permission')->insert($data);
}

// foreach()


return redirect()->route('roles.index')
->with('success','Role created successfully');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$role = Role::find($id);
$rolePermissions  = Role::find($id)->permission_ids;

return view('dashboard.roles.show',compact('role','rolePermissions'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$role = Role::find($id) ;
// dd($role);
$permission = Permission::get();
$rolePermissions  = Role::find($id)->permission_ids;
return view('dashboard.roles.edit',compact('role','permission','rolePermissions'));
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
$this->validate($request, [
'name' => 'required',
'permission' => 'required',
]);
$role = Role::find($id);
$role->name = $request->input('name');

$role->save();

$role->syncPermissions($request->input('permission'));
// dd('dd');
return redirect()->route('roles.index')
->with('success','Role updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    // dd($id);
DB::table("roles")->where('_id',$id)->delete();
return redirect()->route('roles.index')
->with('success','Role deleted successfully');
}
}