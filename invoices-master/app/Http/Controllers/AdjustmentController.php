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
        $data = [];
        $adjustments = [];
        $data['partialView'] = 'adjustment.index';
        $adjusts = Adjustment::all();
        foreach ($adjusts as $adjust) { //to check if the user created this object or not
            if (Auth::id() == $adjust->user_id) {
                $adjustments[] = $adjust;
            }
        }
        return view('adjustment.base', $data, [
            'adjustments' => $adjustments]);
    }

    public function init()
    {//create empty record and redirect to edit to have the view displayed then go to the update to save records
        $adjust = Adjustment::create();
        $id = $adjust->id;
        return redirect(route('adjustments.edit', $id));
    }

    public function edit($id)
    {
        $data = [];
        $data['partialView'] = 'adjustment.edit';
        return view('adjustment.base', $data, ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $adjust = Adjustment::where('id', $id)->update(['name' => $request->name, 'user_id' => Auth::id()]);
        return response()->json([
            'url' => route('adjustments'),
            'success' => 'record has been saved'
        ]);
    }

    public function destroy($id)
    {
        Adjustment::destroy($id);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
