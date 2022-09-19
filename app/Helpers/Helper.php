<?php

namespace App\Helpers;

class Helper
{
    static function validateRequest($request, $rules)
    {
        $request->validate($rules);
    }
    static function imageUploader($file,$filename,$path)
    {
        $file-> move(public_path($path), $filename);
        return $filename;

    }

//    helper for upload images
//          - image , filename, folder
}
