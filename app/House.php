<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class House extends Model
{
    public function images()
    {
        return $this->hasMany('App\Image', 'house_id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address','house_id','id');
    }

    public function bills()
    {
        return $this->hasMany('App\Bill', 'house_id', 'id');
    }
    public function comments(){
        return $this->belongsTo('App\Comments')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    protected $dates = ['created_at', 'updated_at', 'disabled_at','mydate'];
}
