<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Payment;

class Client extends Model
{

    protected $fillable = [
        'name', 'email', 'billing_info', 'payment_method_id', 'admin_show', 'user_id'
    ];
    public   $rules = [
        'email' => 'required|unique:clients'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }

    public function task()
    {
        return $this->hasMany('App\Task');
    }

    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
    public function user_invoices()
    {
        return $this->hasMany('App\Invoice')->where(['user_id' => Auth::id(), 'admin_show' => 1]);
    }

    public function user_tasks()
    {
        return $this->hasMany('App\Task')->where(['user_id' => Auth::id(), 'admin_show' => 1]);
    }

    public function user_contacts()
    {
        return $this->hasMany('App\Contact')->where(['admin_show' => 1]);
    }

    public static function index()
    {
        $data = [];
        $clients = Client::where('user_id', Auth::id())
            ->where('admin_show', 1)
            ->get();
        $data['clients'] = $clients;
        return $data;
    }

    public static function init()
    {
        $client = Client::create(['user_id' => Auth::id()]);
        $id = $client->id;
        return $id;
    }

    public function edit()
    {
        $data = [];
        $data['client'] = $this;
        $payments = Payment::where('user_id', Auth::id())
            ->where('admin_show', 1)
            ->get();
        $data['payments'] = $payments;
        return $data;
    }

    public function uptodate($request)
    {
        $this->update(['name' => $request->name,
            'email' => $request->email,
            'payment_method_id' => $request->payment_method,
            'billing_info' => $request->billing_info,
            'admin_show' => 1]);
    }

    public function deletion($id)
    {
        $client = Client::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        $invoice = count($this->user_invoices);
        $task = count($this->user_tasks);
        $contact = count($this->user_contacts);

        $check = $invoice && $task && $contact;

        if (!$check) {
            Client::destroy($id);
        }
        return $check;
    }
}


