<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class Work_controller extends Controller
{
    public function show()
    {
        return 'hello world';
    }
    public function index()
    {
        $workers = Worker::all();
        return view('workers.index', compact('workers') );
    }
}
