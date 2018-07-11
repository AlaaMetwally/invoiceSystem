<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name', 'email', 'billing_info','payment_method'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }
    public function task()
    {
        return $this->hasMany('App\Task');
    }
    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
}


