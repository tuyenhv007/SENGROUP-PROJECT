<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function house()
    {
        return $this->belongsTo('App\House', 'house_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
