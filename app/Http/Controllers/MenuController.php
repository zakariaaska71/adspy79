<?php

namespace App\Http\Controllers;
use App\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view('dashboard.menus.index')->with('menus',Menu::get());
    }
     public function create(){
        return view('dashboard.menus.create');
    }
    public function store(Request $request){
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->type = $request->type;
        $menu->show = 1;
        $menu->save();
        return redirect()->route('menu.index')->with(['success'=>'تم الإضافة بنجاح']);
    }
    public function edit($id){
          $menu = Menu::find($id);
        return view('dashboard.menus.edit')->with('menu',$menu);
    }
     public function update(Request $request, $id){
          $menu = Menu::find($id);
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->type = $request->type;
        $menu->save();
        return redirect()->route('menu.index')->with(['success'=>'تم التعديل بنجاح']);
    }
       public function destroy( $id){
          $menu = Menu::find($id)->delete();
       
        return redirect()->route('menu.index')->with(['success'=>'تم الحذف بنجاح']);
    }
      public function update_status(Request $request){
        $menu = Menu::findOrFail($request->menuid);
        $menu->show = $request->show;
        $menu->save();
    
        return response()->json(['message' => 'menu status updated successfully.']);
    }
    

}