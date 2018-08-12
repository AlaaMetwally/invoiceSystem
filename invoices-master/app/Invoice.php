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
        return $this->belongsTo('App\User','user_id');
    }
    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    }

    public function adjustment()
    {
        return $this->belongsTo('App\Adjustment','adjustment_id');
    }

    public function tasks(){
        return $this->hasMany('App\Task', 'id');
    }
}
