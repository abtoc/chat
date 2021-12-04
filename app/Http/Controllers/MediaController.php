<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function download($path)
    {
        $path = 'img/'.$path;
        if(!Storage::exists($path)){
            return abort(404);
        }

        $stream = Storage::getDriver()->readStream($path);
        return response()->stream(
            function() use ($stream) {
                fpassthru($stream);
            },
            200,
            [
                'Content-Type' => Storage::mimeType($path),
                'Content-Length' => Storage::size($path),
            ]
        );
    }
}
