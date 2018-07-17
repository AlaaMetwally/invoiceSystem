<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

use Auth;

class Adjustment extends Model
{
    //

    protected $fillable = [
        'name',
        'user_id',
        'admin_show',
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
        return $this->hasMany('App\Invoice')->where(['user_id' => Auth::id(), 'admin_show' => 1]);
    }

    public static function index()
    {
        $data = [];
        //to check if the user created this object or not
        $adjustments = Adjustment::where('user_id', Auth::id())
            ->where('admin_show',1)
            ->get();//admin_show
        $data['adjustments'] = $adjustments;
        return $data;
    }

    public static function init()
    {
        //create empty record and redirect to edit to have the view displayed then go to the update to save records
        $adjust = Adjustment::create(['user_id' => Auth::id()]);
        $id = $adjust->id;
        return $id;
    }

    public function edit()
    {
        $data = [];
        $data['adjustment'] = $this;
        return $data;
    }

    public function uptodate($request, $id)
    {
        Adjustment::where('id', $id)->update(['name' => $request->name, 'admin_show' => 1]);
    }

    public function deletion($id)
    {
        $adjustment = Adjustment::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $check = count($this->user_invoices);
        if($check){

        }else{
            Adjustment::destroy($id);
        }
        return $check;
    }
}
