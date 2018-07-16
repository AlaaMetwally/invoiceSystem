<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adjustment;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class AdjustmentController extends Controller
{
    //
    public function index()
    {
        $data = Adjustment::index();
        $data['partialView'] = 'adjustment.index';
        return view('adjustment.base', $data);
    }

    public function init()
    {
        $id = Adjustment::init();
        return redirect(route('adjustment.edit', $id));
    }

    public function edit($id)
    {
        $adjustment = Adjustment::findOrFail($id); //check for auth user
        $data = $adjustment->edit();
        $data['partialView'] = 'adjustment.edit';
        return view('adjustment.base', $data);
    }

    public function update(Request $request, $id)
    {
        $adjustment = Adjustment::findOrFail($id);
        $adjustment->uptodate($request, $id);
        return response()->json([
            'url' => route('adjustment.index'),
            'success' => 'record has been saved'
        ]);
    }

    public function destroy($id)
    {
        $adjustment = Adjustment::findOrFail($id);
        $check = $adjustment->deletion($id);
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
