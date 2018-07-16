<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','country','city','logo'
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
        return $this->hasMany('App\Client');
    }
    public function services()
    {
        return $this->hasMany('App\Service');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function currencies()
    {
        return $this->hasMany('App\Currency');
    }
    public function units()
    {
        return $this->hasMany('App\Unit');
    }
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    public function adjustments()
    {
        return $this->hasMany('App\Adjustment');
    }
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
}
