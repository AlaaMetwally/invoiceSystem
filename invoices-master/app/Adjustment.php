<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    //

    protected $fillable = [
        'name',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }
}
