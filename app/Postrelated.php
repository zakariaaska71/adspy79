<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Postrelated extends Model
{
    protected $guarded=[];
    public function posts()
    {
        return $this->belongTo(Post::class);
    }
}
