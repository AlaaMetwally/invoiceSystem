<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Validator;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $data = Payment::index();
        $data['partialView'] = 'payment.index';
        return view('payment.base', $data);
    }

    public function init()
    {
        $id = Payment::init();
        return redirect(route('payment.edit', $id));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $data = $payment->edit();
        $data['partialView'] = 'payment.edit';
        return view('payment.base', $data);
    }

    public function update(Request $request, $id)
    {
        if ($id == "null") {
            if($_POST['payment']){
                $validator = Validator::make($_POST, [
                    'payment' => 'unique:payments,name,' . $id
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => 'name exists'
                    ]);
                } else {
                    $payment = Payment::create(['user_id' => Auth::id(),
                        'name' => $_POST['payment'],
                        'admin_show' => 1
                    ]);
                    return response()->json([
                        'id' => $payment->id,
                        'success' => 'record has been saved'
                    ]);
                }
            }

        } else {
            $payment = Payment::findOrFail($id);
            $payment->uptodate($request);
            return response()->json([
                'url' => route('payment.index'),
                'success' => 'record has been saved'
            ]);
        }
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->deletion($id);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
