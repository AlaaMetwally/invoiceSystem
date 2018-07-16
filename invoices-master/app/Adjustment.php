<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Adjustment extends Model
{
    //

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }

    public function user_invoices()
    {
        return $this->hasMany('App\Invoice')->where(['user_id'=> Auth::id(),'admin_show' => 1]);
    }
}
