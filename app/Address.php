<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function house()
    {
        return $this->belongsTo('App\House','house_id','id');
    }
}
