<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = [
        'invoice_number','adjustment_type','adjustment_percent','vat_percent','notes',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function adjustment()
    {
        return $this->belongsTo('App\Adjustment');
    }
}
