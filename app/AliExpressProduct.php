<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class AliExpressProduct extends Model
{
        protected $guarded =[];
         public function daliy()
    {
        return $this->hasMany(AliDaily::class, 'product_id');
    }

}
