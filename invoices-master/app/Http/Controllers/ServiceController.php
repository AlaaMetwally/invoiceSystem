<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $data = Service::index();
        $data['partialView'] = 'service.index';
        return view('service.base', $data);
    }

    public function init()
    {
        $id = Service::init();
        return redirect(route('service.edit', $id));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id); 
        $data = $service->edit();
        $data['partialView'] = 'service.edit';
        return view('service.base', $data);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->uptodate($request);
        return response()->json([
            'url' => route('service.index'),
            'success' => 'record has been saved'
        ]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $check = $service->deletion($id);
        if ($check) {
            return response()->json([
                'error' => 'Record is related to other recorders in another tables!'
            ]);
        } else {
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }
    }
}
