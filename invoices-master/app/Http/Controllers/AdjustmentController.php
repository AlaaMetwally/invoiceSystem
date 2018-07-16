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
        $data['partialView'] = 'adjustment.index';
        //to check if the user created this object or not
        $adjustments = Adjustment::where('user_id', Auth::id())->get();
        $data['adjustments'] = $adjustments;
        return view('adjustment.base', $data);
    }

    public function init()
    {//create empty record and redirect to edit to have the view displayed then go to the update to save records
        $adjust = Adjustment::create(['user_id' => Auth::id()]);
        $id = $adjust->id;
        return redirect(route('adjustments.edit', $id));
    }

    public function edit($id)
    {
        $data = [];
        $adjustment = Adjustment::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        $data['partialView'] = 'adjustment.edit';
        $data['adjustment'] = $adjustment;
        return view('adjustment.base', $data);
    }

    public function update(Request $request, $id)
    {
        $adjust = Adjustment::where('id', $id)->update(['name' => $request->name]);
        return response()->json([
            'url' => route('adjustments'),
            'success' => 'record has been saved'
        ]);
    }

    public function destroy($id)
    {
        $adjustment = Adjustment::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
        if (count($adjustment->user_invoices)) {
            return response()->json([
                'error' => 'Record is related to other recorders in another tables!'
            ]);
        } else {
            Adjustment::destroy($id);
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }
    }
}
