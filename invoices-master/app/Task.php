<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $fillable = [
        'name','po_number','invoice_number','unit_price','amount','fixed_price','start_date','delivery_date',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}
