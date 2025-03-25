<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class File_Controller extends Controller
{
    public function writeFile(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'Файл не найден'], 400);
        }
        
        $file = $request->file('file');

        $path = Storage::disk('test')->put('uploads', $file);

        return redirect('/files');
    }
    public function storage(){
        $files = Storage::disk('test')->allFiles();

        return view('file.storage', compact('files') );
    }
    public function uploader(){
        return view('file.file');
    } 
}
