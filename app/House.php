<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class House extends Model
{
    public function images()
    {
        return $this->hasMany('App\Image', 'house_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function bills()
    {
        return $this->hasMany('App\Bill', 'house_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
