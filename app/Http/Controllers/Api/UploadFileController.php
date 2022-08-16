<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\PostImport;
use Maatwebsite\Excel\Facades\Excel;
class UploadFileController extends Controller
{
  public function import() 
    {
   
        Excel::import(new PostImport,request()->file('file'));
           
          $response = [
            'success' => true ,
            'data' => 'success',
            'message' => 'upload succefuly'
        ];
        return response()->json($response , 200);
}
}
