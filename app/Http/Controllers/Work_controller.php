<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Achievement;

class Work_Controller extends Controller
{
    public function index(Request $request)
    {
        $query = Worker::query();
        $allWorkers = Worker::all();

        if ($request->input('alphSort')==1) {
            $query->orderBy('name', 'asc');
        }
        if ($request->input('moneySort')==1) {
            $query->orderBy('payment_type', 'asc');
        }
        if ($request->input('role_sort')) {
            $query->where('role_type', $request->input('role_sort'));
        }
    
        $workers = $query->paginate(10);

        return view('workers.index', compact('workers', 'allWorkers') );
    }
    public function add()
    {
        $medals = Achievement::all();
        return view('workers.add', compact('medals'));
    }
    public function addInTo(Request $request)
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
                'regex:/^[A-Z][a-z]+ [A-Z][a-z]+$/',
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

        return redirect('/list');
    }
    public function autoAdd()
    {
        $medals = Achievement::all();
        Worker::factory()->count(10)->create();
        return view('workers.add', compact('medals'));
    }
}
