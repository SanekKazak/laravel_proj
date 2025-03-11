<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class Work_controller extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        return view('workers.index', compact('workers') );
    }
    public function add()
    {
        return view('workers.add');
    }
    public function home()
    {
        return view('workers.home' );
    }
    public function add_INTO(Request $request)
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[\w\.-]+@([\w\-]+\.)+[\w\-]{2,4}$/',
                'unique:workers,email',
            ],
            'name' => [
                'required',
                'regex:/^[A-Za-z]+([-\s][A-Za-z]+)*$/',
            ],
            'payment_type' => 'required',
            'role_type' => 'required',
        ]);

        Worker::create([
            'email' => $request->input('email'),
            'payment_type' => $request->input('payment_type'),
            'role_type' => $request->input('role_type'),
            'name' => $request->input('name'),
        ]);

        $workers = Worker::all();
        return view('workers.index', compact('workers') );
    }
}
