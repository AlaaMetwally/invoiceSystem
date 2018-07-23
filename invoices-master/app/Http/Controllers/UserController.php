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
        $width = (integer)json_decode($request->dataimage)->width;
        $height = (integer)json_decode($request->dataimage)->height;
        $top = (integer) json_decode($request->dataimage)->top;
        $bottom = (integer) json_decode($request->dataimage)->bottom;
        $right = (integer) json_decode($request->dataimage)->right;
        $left = (integer) json_decode($request->dataimage)->left;
        $img->crop($width, $height, $width-$x,$height-$y);

        Storage::disk('local')->put('uploads/users/'.$pathname, $img->stream());
        
        User::where('id', $id)->update([
            'logo' => $request->image,
        ]);

        return response()->json([
            'url' => route('user.edit', $id),
            'success' => 'Image Upload successful',
            'id' => $id,
        ]);
    }
}
