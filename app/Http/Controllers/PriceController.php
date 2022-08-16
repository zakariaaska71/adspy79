<?php

namespace App\Http\Controllers;
use Maklad\Permission\Models\Role;

use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(){
        return view('dashboard.price.index')->with('prices',Price::get());
    }
    public function create(){
        $roles = Role::get();
        return view('dashboard.price.create')->with('roles',$roles);
    }
    public function store(Request $request){
        $request_all = $request->all();
        $request_all['status']= 'yes';
        Price::create($request_all);
        return redirect()->route('price.index')->with(['success'=>'تم الإضافة بنجاح']);
    }
    public function edit($id){
        $roles = Role::get();
        return view('dashboard.price.edit')->with('price',Price::find($id))->with('roles',$roles);

    }
    public function update(Request $request,$id){
      $price=  Price::find($id);
      $request_all = $request->all();
  
    $price->update($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

    }
    public function destroy($id){
        // dd('dd');
        $price=  Price::find($id);
        $price->destroy($id);
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
    public function update_status(Request $request){
        $price = Price::findOrFail($request->priceid);
        $price->status = $request->status;
        $price->save();
    
        return response()->json(['message' => 'price status updated successfully.']);
    }

}
