<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
//laravel storage
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    function getfile($filename){
        $fullpath = public_path('files').'/'.str_replace('"', "", $filename);

        return response()->download($fullpath);

    }
    public function index()
    {
        $files = File::latest()->paginate(5);

        return view('download',compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
