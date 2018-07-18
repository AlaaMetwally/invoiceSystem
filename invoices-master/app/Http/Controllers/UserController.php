<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

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

//        $image = $request->logo;
//        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
//
//
//        $destinationPath = public_path('/thumbnail');
//        $img = Image::make($image->getRealPath());
//        $img->resize(100, 100, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save($destinationPath.'/'.$input['imagename']);
//
//
//        $destinationPath = public_path('/images');
//        $image->move($destinationPath, $input['imagename']);
//
//
//        $this->postImage->add($input);


        User::where('id', $id)->update(['name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'logo' => $request->logo]);

        return response()->json([
            'url' => route('user.index'),
            'success' => 'record has been saved',
            'image' => $request->logo
        ]);
    }

}
