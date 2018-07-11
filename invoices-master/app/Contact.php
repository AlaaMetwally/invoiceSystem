<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'phone','title',
    ];
    public function task()
    {
        return $this->hasMany('App\Task');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
