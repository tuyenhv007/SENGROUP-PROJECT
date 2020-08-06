<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'avatar_original', 'avatar', 'google_id'
    ];

    public function house()
    {
        return $this->belongsTo('App\User', 'google_id', 'id');
    }

}
