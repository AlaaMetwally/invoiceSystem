<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Validator;

class Service extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'admin_show',
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function task()
    {
        return $this->hasMany('App\Task','service_id');
    }
    public function user_tasks()
    {
        return $this->hasMany('App\Task')->where(['user_id' => Auth::id(), 'admin_show' => 1]);
    }
    public static function index()
    {
        $data = [];
        $services = Service::where('user_id', Auth::id())
            ->where('admin_show',1)
            ->get();//admin_show
        $data['services'] = $services;
        return $data;
    }

    public static function init()
    {
        $service= Service::create(['user_id' => Auth::id()]);
        $id = $service->id;
        return $id;
    }

    public function edit()
    {
        $data = [];
        $data['service'] = $this;
        return $data;
    }

    public function uptodate($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:services,name,' . $this->id
        ]);
        if ($validator->fails()) {
            $check = 1;
        } else {
            $this->update(['name' => $request->name,
                'description' => $request->info,
                'admin_show' => 1]);
            $check = 0;
        }

        return $check;
    }

    public function deletion($id)
    {
        $service = Service::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $check = count($this->user_tasks);
        if(!$check){
            Service::destroy($id);
        }
        return $check;
    }
}

