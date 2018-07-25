<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Currency extends Model
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
        //to check if the user created this object or not
        $currencies = Currency::where('user_id', Auth::id())
            ->where('admin_show',1)
            ->get();//admin_show
        $data['currencies'] = $currencies;
        return $data;
    }

    public static function init()
    {
        //create empty record and redirect to edit to have the view displayed then go to the update to save records
        $curr = Currency::create(['user_id' => Auth::id()]);
        $id = $curr->id;
        return $id;
    }

    public function edit()
    {
        $data = [];
        $data['currency'] = $this;
        return $data;
    }

    public function uptodate($request, $id)
    {
        Currency::where('id', $id)->update(['name' => $request->name, 'admin_show' => 1]);
    }

    public function deletion($id)
    {
        $currency = Currency::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $check = count($this->user_tasks);
        
        if($check){

        }else{
            Currency::destroy($id);
        }
        return $check;
    }
}
