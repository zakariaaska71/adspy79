<?php
namespace App\Imports;

use App\CategoryAli;
use Carbon\Carbon;
use Illuminate\Support\Collection; 
use Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use DB;

class CategoryImport implements ToCollection { 
      public function collection(Collection $rows) { 
                dd($rows);

           
    }
}

