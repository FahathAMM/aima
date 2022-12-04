<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public static function imageUpload($fileName, $path, $disk = 'local')
    {
        $imgName = time() . '.' . $fileName->getClientOriginalExtension();
        $path    = $fileName->storeAs($path, $imgName, $disk);
        return $path;
    }
}
