<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    public function houses()
    {
        return $this->hasMany('App\House', 'host_id', 'id');
    }
}
