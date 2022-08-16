<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('dashboard.product.index')->with('products',Product::get());
    }
    public function create(){
        return view('dashboard.product.create');
    }
    public function store(Request $request){

        $request_all = $request->except(['image']);
        $request_all['image']= $request->image->store('product');
        $request_all['status']= 'yes';
        Product::create($request_all);
        return redirect()->route('product.index')->with(['success'=>'تم الإضافة بنجاح']);
    }
    public function edit($id){
        return view('dashboard.product.edit')->with('product',Product::find($id));

    }
    public function update(Request $request,$id){
      $product=  Product::find($id);
      $request_all = $request->except(['image']);
    if($request->image != null){
        $request_all['image']= $request->image->store('product');

    }
    $product->update($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

    }
    public function destroy($id){
        // dd('dd');
        $product=  Product::find($id);
        $product->destroy($id);
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
    public function update_status(Request $request){
        $product = Product::findOrFail($request->productid);
        $product->status = $request->status;
        $product->save();
    
        return response()->json(['message' => 'product status updated successfully.']);
    }

}
