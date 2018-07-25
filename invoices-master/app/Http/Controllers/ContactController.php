<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ContactController extends Controller
{
    //
    public function index()
    {
        $data = Contact::index();
        $data['partialView'] = 'contact.index';
        return view('contact.base', $data);
    }

    public function init()
    {
        $id = Contact::init();
        return redirect(route('contact.edit', $id));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id); //check for auth user
        $data = $contact->edit();
        $data['partialView'] = 'contact.edit';
        return view('contact.base', $data);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->uptodate($request);
        return response()->json([
            'url' => route('contact.index'),
            'success' => 'record has been saved'
        ]);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $check = $contact->deletion($id);
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
