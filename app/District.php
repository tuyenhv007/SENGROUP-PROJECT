<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }
    public function roads(){
        return $this->hasMany('App\Road');
    }
}
