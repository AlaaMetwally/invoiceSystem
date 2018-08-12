<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Unit extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
        'admin_show',
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function task()
    {
        return $this->hasMany('App\Task','id');
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
        $validator = Validator::make($request->all(), [
            'name' => 'unique:units,name,' . $this->id
        ]);
        if ($validator->fails()) {
            $check = 1;
        } else {
            $this->update(['name' => $request->name, 'admin_show' => 1]);
            $check = 0;
        }

        return $check;
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
