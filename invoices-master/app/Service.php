<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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
        return $this->belongsTo('App\User');
    }
    public function task()
    {
        return $this->hasMany('App\Task');
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

    public function uptodate($request, $id)
    {
        Service::where('id', $id)->update(['name' => $request->name, 
        'description' => $request->info,
        'admin_show' => 1]);
    }

    public function deletion($id)
    {
        $service = Service::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $check = count($this->user_tasks);
        
        if($check){

        }else{
            Service::destroy($id);
        }
        return $check;
    }
}

