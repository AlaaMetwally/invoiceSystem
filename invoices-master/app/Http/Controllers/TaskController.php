<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Contact;
use App\Invoice;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class TaskController extends Controller
{
    //
    public function index()
    {
        $data=[];
//        $data = Task::index();
        $data['partialView'] = 'task.index';
        return view('task.base', $data);
    }
    public function anyData()
    {
        
        $tasks = Task::where('user_id', Auth::id());
        //data model fn
        return Datatables::of($tasks)
        ->editColumn('total', function ($task) {
            return ($task['amount'] * $task['unit_price']);
        })
            ->editColumn('client_id', function ($task) {
                return ($task->client?$task->client->name:'');
            })
            ->editColumn('service_id', function ($task) {
                return ($task->service?$task->service->name:'');
            })
            ->editColumn('unit_id', function ($task) {
                return ($task->unit?$task->unit->name:'');
            })
        ->editColumn('finished', function ($task) {
            if($task->name == null
            && $task->service_id == null 
            && $task->client_id == null 
            && $task->invoice == null 
            && $task->po_number == null 
            && $task->unit_id == null 
            && $task->unit_price == null 
            && $task->amount == null 
            && $task->fixed_price == null 
            && $task->start_date == null 
            && (($task->amount) * ($task->unit_price)) == null
            )
            return "No";
            else
            return "Yes";
        })
        ->editColumn('invoiced', function ($task) {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ;
            if($task->invoice && $task->invoice_number_id == $task->invoice->id)
            return "Yes";
            else
            return "No";
        })
        ->editColumn('invoice_number', function ($task) {
            if($task->invoice)
           return $task->invoice->invoice_number;
           else
           return "";
        })
        ->addColumn('actions', function ($task) {
            return '';
        })
        ->filter(function ($query) {
           Task::filter($query);
        })
            ->make(true);
    }
    public function init()
    {
        $id = Task::init();
        return redirect(route('task.edit', $id));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id); 
        $data = $task->edit();
        $data['partialView'] = 'task.edit';
        return view('task.base', $data);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->uptodate($request);
        return response()->json([
            'url' => route('task.index'),
            'success' => 'record has been saved'
        ]);
    }
    public function parsedata(Request $request,$id){
        $invoices = Invoice::where('admin_show',1)
            ->where('client_id',$id)
            ->get();
        $contacts= Contact::where('admin_show',1)
            ->where('client_id',$id)
            ->get();

        return response()->json([
            'contact' => $contacts,
            'invoice' => $invoices
        ]);
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->deletion($id);
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
    }
}
