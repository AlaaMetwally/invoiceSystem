<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Validator;

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
        return $this->belongsTo('App\User','user_id');
    }
    public function user_clients()
    {
        return $this->hasMany('App\Client')->where(['user_id' => Auth::id(),'admin_show' => 1]);
    }
    public function client()
    {
        return $this->hasMany('App\Client','id');
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
            $validator = Validator::make($request->all(), [
            'name' => 'unique:payments,name,' . $this->id
            ]);
            if ($validator->fails()) {
                $check = 1;
            } else {
                $this->update(['name' => $request->name,
                'info' => $request->info,
                'admin_show' => 1]);
                $check = 0;
            }

        return $check;
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
