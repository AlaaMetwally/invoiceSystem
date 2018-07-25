<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $fillable = [
        'name',
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
        $units = Unit::where('user_id', Auth::id())
            ->where('admin_show',1)
            ->get();
        $data['units'] = $units;
        return $data;
    }

    public static function init()
    {
        $unit= Unit::create(['user_id' => Auth::id()]);
        $id = $unit->id;
        return $id;
    }

    public function edit()
    {
        $data = [];
        $data['unit'] = $this;
        return $data;
    }

    public function uptodate($request)
    {
        $this->update(['name' => $request->name, 'admin_show' => 1]);
    }

    public function deletion($id)
    {
        $unit = Unit::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $check = count($this->user_tasks);
        
        if(!$check){
            Unit::destroy($id);
        }
        return $check;
    }
}
