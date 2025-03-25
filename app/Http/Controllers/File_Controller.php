<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Achievement;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class File_Controller extends Controller
{
    public function writeFile(Request $request)
    {
        if (!$request->hasFile('file')) {
            return redirect('/files')->withErrors(['file' => 'Файл не был загружен.']);
        }
    
        $validator = Validator::make($request->all(), [
            'file' => [
                'required',
                'file',
                'max:1024',
                function ($attribute, $value, $fail) {
                    $filename = $value->getClientOriginalName();
                    
                    if (!preg_match('/^\d+\.(jpg|jpeg|png)$/i', $filename)) {
                        $fail('Название файла должно начинаться с цифры и иметь расширение .jpg, .jpeg или .png.');
                        return;
                    }
    
                    if (Achievement::where('filename', $filename)->exists()) {
                        $fail('Файл с таким именем уже существует.');
                    }
                },
            ],
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $file = $request->file('file');
    
        $path = $file->storeAs('/', $file->getClientOriginalName());
     
        Achievement::create([
            'path' => str_replace('/', '', $path),
            'filename' => $file->getClientOriginalName(),
        ]);
        return redirect('/files');
    }
    public function storage(){
        $files = Storage::disk('public')->allFiles();
        return view('file.storage', compact('files') );
    }
    public function delete(Request $request){
        $filename = $request->input('filename');

        if (Storage::disk('public')->exists('/' . $filename)) {
            Storage::disk('public')->delete('/' . $filename);
            $achievement = Achievement::findOrFail($filename);
            $achievement->delete();
            return redirect('/files');
        }
        return redirect('/files');
    }
    public function uploader(){
        return view('file.file');
    }
    public function achievements(Request $request){

    }
}
