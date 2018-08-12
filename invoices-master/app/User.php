<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use http\Env\Request;


use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone','address','country','city','logo','admin_show','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function clients()
    {
        return $this->hasMany('App\Client','id');
    }
    public function services()
    {
        return $this->hasMany('App\Service','id');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment','id');
    }
    public function currencies()
    {
        return $this->hasMany('App\Currency','id');
    }
    public function units()
    {
        return $this->hasMany('App\Unit','id');
    }
    public function tasks()
    {
        return $this->hasMany('App\Task','id');
    }
    public function adjustments()
    {
        return $this->hasMany('App\Adjustment','id');
    }
    public function invoices()
    {
        return $this->hasMany('App\Invoice','id');
    }
}
