<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = [];
        //to check if the user created this object or not
        $user = User::where('id', Auth::id())
            ->where('admin_show', 1)
            ->first();
        $data['user'] = $user;
        $data['partialView'] = 'user.index';
        return view('user.base', $data);
    }

    public function edit($id)
    {
        $data = [];
        $user = User::findOrFail($id);
        $data['partialView'] = 'user.edit';
        $data['user'] = $user;
        return view('user.base', $data);
    }

    public function update(Request $request, $id)
    {
     User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            ]);

        return response()->json([
            'url' => route('user.index'),
            'success' => 'record has been saved'
        ]);
    }
    public function upload(Request $request,$id){
        $image = $request->image;
        User::where('id', $id)->update([
            'logo' => $request->image,
            ]);
            return response()->json([
                'url' => route('user.edit',$id),
                'success' => 'Image Upload successful',
                'id' => $id,
                'image' => $image
            ]);
    }
}
