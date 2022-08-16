<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\PostImport;
use App\Imports\PostImport;
use App\Imports\CatImport;
use App\Imports\ProductImport;
use App\Imports\CategoryImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\CategoryAli;
use App\AliproductId;


class UploadController extends Controller
{
    
    public function importExportView()
    {
        return view('import');
    }
     public function importExportViewali()
    {
        dd(CategoryAli::paginate(50));
       
       
        $client = new \GuzzleHttp\Client();
       
        
        $r = $client->request('get', 'https://docs.zapiex.com/categories/en_US_searchCategories.json', [
        ]);
        $res = json_decode($r->getBody()->getContents());
        // dd($res->searchCategories);
        foreach($res->searchCategories as $cat){
            // dd($cat->id);
            if($cat->level == 1){
                $ali = new CategoryAli();
                $ali->categoy_id = $cat->id;
                $ali->name = $cat->enName;
                $ali->save();
            }else{
                break;
            }
        }
       
       
    }
    public function importExportViewcats()
    {
        return view('importcats');
    }
      public function importExportViewproduct()
    {
        return view('importproducts');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new PostImport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
     
     
     public function importproductsali(Request $request)
    {
        // dd($request->all());
        Excel::import(new CategoryImport, $request->file);

        return back();
    }
    public function import()
    {
        try {
            Excel::import(new PostImport, request()->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            Log::alert($e->failures());
        }
        // Excel::import(new PostImport,request()->file('file'));

        return back();
    }
    public function importcats()
    {
        try {
            Excel::import(new CatImport , request()->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            Log::alert($e->failures());
        }

        return back();
    }
     public function importproducts()
    {
        try {
            Excel::import(new ProductImport , request()->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            alert('dd');
            Log::alert($e->failures());
        }

        return back();
    }
}
