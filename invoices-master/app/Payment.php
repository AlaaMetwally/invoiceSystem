<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Payment extends Model
{
    //
    protected $fillable = [
        'name',
        'info',
        'user_id',
        'admin_show',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function user_clients()
    {
        return $this->hasMany('App\Client')->where(['user_id' => Auth::id(),'admin_show' => 1]);
    }
    public function client()
    {
        return $this->hasMany('App\Client');
    }
    public static function index()
    {
        $data = [];
        $payments = Payment::where('user_id', Auth::id())
            ->where('admin_show', 1)
            ->get();
        $data['payments'] = $payments;
        return $data;
    }

    public static function init()
    {
        $pay = Payment::create(['user_id' => Auth::id()]);
        $id = $pay->id;
        return $id;
    }

    public function edit()
    {
        $data = [];
        $data['payment'] = $this;
        return $data;
    }

    public function uptodate($request)
    {
        $this->update(['name' => $request->name,
        'info' => $request->info,
        'admin_show' => 1]);
    }

    public function deletion($id)
    {
        $payment = Payment::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $check = count($this->user_clients);
        if (!$check) {
            Payment::destroy($id);
        }
        return $check;
    }
}
