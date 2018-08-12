<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Validator;
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
        if ($id == "null") {
            if ($_POST['data']) {
                $validator = Validator::make($_POST, [
                    'data' => 'unique:units,name,' . $id
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => 'name exists'
                    ]);
                } else {
                    $unit= Unit::create(['user_id' => Auth::id(),
                        'name' => $_POST['data'],
                        'admin_show' => 1
                    ]);
                    return response()->json([
                        'id' => $unit->id,
                        'success' => 'record has been saved'
                    ]);
                }
            }

        } else {
            $unit = Unit::findOrFail($id);
            $unit->uptodate($request);
            return response()->json([
                'url' => route('unit.index'),
                'success' => 'record has been saved'
            ]);
        }
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
