<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\User;

class ImageController extends Controller
{
    public function addImage() {
        return view ('image.addImage');
    }

    public function postImage(Request $request) {
        $userId= Auth::user()->id;
        $user= User::find($userId);
        if($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path='Images\users';
            $filename= Helper::imageUploader($file,$filename,$path);
            $user->images= $filename;
            $user->save();
        }
        return redirect()->route('home');
    }
}
