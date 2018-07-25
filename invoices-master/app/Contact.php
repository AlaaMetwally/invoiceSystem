<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'title', 'client_id', 'admin_show',
    ];

    public function task()
    {
        return $this->hasMany('App\Task');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function user_tasks()
    {
        return $this->hasMany('App\Task')->where(['admin_show' => 1]);
    }

    public static function index()
    {
        $data = [];
        $contacts = Contact::where('admin_show', 1)->get();
        $data['contacts'] = $contacts;
        return $data;
    }

    public static function init()
    {
        $contact = Contact::create(['user_id' => Auth::id()]);
        $id = $contact->id;
        return $id;
    }

    public function edit()
    {
        $data = [];
        $data['contact'] = $this;
        return $data;
    }

    public function uptodate($request)
    {
        $this->update(['name' => $request->name,
            'title' => $request->title,

            'admin_show' => 1]);
    }

    public function deletion($id)
    {
        $contact = Contact::where('id', $id)
            ->first();
        $check = count($this->user_tasks);
        if ($check) {

        } else {
            Contact::destroy($id);
        }
        return $check;
    }
}
