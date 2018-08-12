<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
    public function index()
    {
        $data = Client::index();
        $data['partialView'] = 'client.index';
        return view('client.base', $data);
    }

    public function init()
    {
        $id = Client::init();
        return redirect(route('client.edit', $id));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $data = $client->edit();
        $data['partialView'] = 'client.edit';
        return view('client.base', $data);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $check = $client->uptodate($request);
        if ($check) {
            return response()->json([
                'error' => 'email exists'
            ]);
        } else {
            return response()->json([
                'url' => route('client.index'),
                'success' => 'record has been saved'
            ]);
        }
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $check = $client->deletion($id);
        if (!$check) {
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
