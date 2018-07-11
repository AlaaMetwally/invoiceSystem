<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'name','info',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
