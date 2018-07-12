<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adjustment;
use Yajra\Datatables\Datatables;

class AdjustmentController extends Controller
{
    //
    public function index()
    {
        $data=[];

        $data['partialView']='adjustment.index';
        $adjustments = Adjustment::all();
        return view('adjustment.base', $data,[
            'adjustments' => $adjustments]);
    }
    public function create(){

    }
    public function store(){

    }
    public function edit($id){

    }
    public function update($id){

    }
    public function destroy($id)
    {
        Adjustment::destroy($id);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
