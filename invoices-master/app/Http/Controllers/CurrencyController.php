<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Validator;

class CurrencyController extends Controller
{
    //
    public function index()
    {
        $data = Currency::index();
        $data['partialView'] = 'currency.index';
        return view('currency.base', $data);
    }

    public function init()
    {
        $id = Currency::init();
        return redirect(route('currency.edit', $id));
    }

    public function edit($id)
    {
        $currency = Currency::findOrFail($id); //check for auth user
        $data = $currency->edit();
        $data['partialView'] = 'currency.edit';
        return view('currency.base', $data);
    }

    public function update(Request $request, $id)
    {
        if ($id == "null") {
            if ($_POST['data']) {
                $validator = Validator::make($_POST, [
                    'data' => 'unique:currencies,name,' . $id
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => 'name exists'
                    ]);
                } else {
                    $currency = Currency::create(['user_id' => Auth::id(),
                        'name' => $_POST['data'],
                        'admin_show' => 1
                    ]);
                    return response()->json([
                        'id' => $currency->id,
                        'success' => 'record has been saved'
                    ]);
                }
            }

        } else {
            $currency = Currency::findOrFail($id);
            $currency->uptodate($request);
            return response()->json([
                'url' => route('currency.index'),
                'success' => 'record has been saved'
            ]);
        }
    }
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $check = $currency->deletion($id);
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
