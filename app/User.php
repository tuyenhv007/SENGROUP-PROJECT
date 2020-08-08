<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */


    protected $fillable = [
        'name', 'email', 'password', 'id', 'image', 'provider', 'provider_id'

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function houses()
    {
        return $this->hasMany('App\House');
    }

    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function billss(){
        return $this->hasManyThrough('App\Bill','App\House');
    }
}
