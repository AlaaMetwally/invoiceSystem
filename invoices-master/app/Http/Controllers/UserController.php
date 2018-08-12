<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

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

    public function upload(Request $request, $id)
    {
        $pathname = $request->file('pathname')->getClientOriginalName();
        $path = $request->file('pathname');
        $img = Image::make($path);
        $x = (integer)json_decode($request->dataimage)->x;
        $y = (integer)json_decode($request->dataimage)->y;
        $width = (integer)json_decode($request->dataimage)->w;
        $height = (integer)json_decode($request->dataimage)->h;

        $img->crop($width, $height, $x, $y);
        $imageName = '/uploads/users/' . time() . '_' . $pathname;
        Storage::disk('local')->put('public' . $imageName, $img->stream());

        $imgPath = json_encode(Storage::disk('local')->get('public' . $imageName));

        User::where('id', $id)->update([
            'logo' => $imageName,
        ]);

        return response()->json([
            'url' => route('user.edit', $id),
            'success' => 'Image Upload successful',
            'id' => $id,
            'image' => $imgPath,
        ]);
    }
}
