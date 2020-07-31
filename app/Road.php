<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    public function district(){
        return $this->belongsTo('App\District','district_id','id');
    }
}
