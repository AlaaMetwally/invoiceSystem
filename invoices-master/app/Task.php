<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Task extends Model
{
    //

    protected $fillable = [
        'name',
        'po_number',
        'invoice_number_id',
        'unit_price',
        'amount',
        'fixed_price',
        'start_date',
        'delivery_date',
        'user_id',
        'service_id',
        'client_id',
        'contact_id',
        'currency_id',
        'unit_id',
        'admin_show'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function invoice(){
        return $this->belongsTo('App\Invoice','invoice_number_id');
    }
    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Service','service_id');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit','unit_id');
    }
    public function currency()
    {
        return $this->belongsTo('App\Currency','currency_id');
    }
    public function contact()
    {
        return $this->belongsTo('App\Contact','contact_id');
    }
   
    public static function index()
    {
        $data = [];
        $tasks = Task::where('user_id', Auth::id())
            ->where('admin_show',1)
            ->get();
        $data['tasks'] = $tasks;
        return $data;
    }

    public static function init()
    {
        $task = Task::create(['user_id' => Auth::id()]);
        $id = $task->id;
        return $id;
    }
    public static function filter($query){
        if (request()->has('searchtask') ){
            $query->where('name', 'like', "%" . request('searchtask') . "%");
        }
        if (request()->has('unitpricefrom') ) {
            $query->where('unit_price', '>=',request('unitpricefrom'));
        }
        if(request()->has('unitpriceto')){
            $query->where('unit_price', '<=',request('unitpriceto'));
        }
        if (request()->has('searchdatefrom')) {
            $from = Carbon::parse(request('searchdatefrom'))->format('Y-m-d');
            $query->where('start_date','>=',$from);
        }
        if( request()->has('searchdateto')){
            $to = Carbon::parse(request('searchdateto'))->format('Y-m-d');
            $query->where('start_date', '<=',$to);
        }
    }
    public function edit()
    {
        $data = [];
        $services = Service::where('user_id',Auth::id())
        ->where('admin_show',1)
        ->get();
        $clients = Client::where('user_id',Auth::id())
        ->where('admin_show',1)
        ->get();

        $currencies = Currency::where('user_id',Auth::id())
            ->where('admin_show',1)
            ->get();
        $units = Unit::where('user_id',Auth::id())
            ->where('admin_show',1)
            ->get();
        $data['task'] = $this;
        $data['services'] = $services;
        $data['clients'] = $clients;
        $data['currencies'] = $currencies;
        $data['units'] = $units;
        return $data;
    }

    public function uptodate($request)
    {
        $this->update(['name' => $request->name, 
        'po_number' => $request->po_num,
        'service_id' => $request->service,
        'client_id' => $request->client,
        'contact_id' => $request->contact,
        'invoice_number_id' => $request->invoice,
        'currency_id' => $request->currency,
        'unit_id' => $request->unit,
        'unit_price' => $request->unit_price,
        'amount' => $request->amount,
        'fixed_price' => $request->fixed_price,
        'start_date' => $request->start_date,
        'delivery_date' => $request->delivery_date,
        'admin_show' => 1]);
    }

    public function deletion($id)
    {
            Task::destroy($id);
    }
}
