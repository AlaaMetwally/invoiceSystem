<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class UnitController extends Controller
{
    //
    public function index()
    {
        $data = Unit::index();
        $data['partialView'] = 'unit.index';
        return view('unit.base', $data);
    }

    public function init()
    {
        $id = Unit::init();
        return redirect(route('unit.edit', $id));
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id); //check for auth user
        $data = $unit->edit();
        $data['partialView'] = 'unit.edit';
        return view('unit.base', $data);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->uptodate($request, $id);
        return response()->json([
            'url' => route('unit.index'),
            'success' => 'record has been saved'
        ]);
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $check = $unit->deletion($id);
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
