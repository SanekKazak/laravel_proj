<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class Work_controller extends Controller
{
    public function index(Request $request)
    {
        $workers = Worker::all();

        if($request->input('alphSort')==1){
            $workers = $workers->sortBy('name');
        }
        if($request->input('moneySort')==1){
            $workers = $workers->sortBy('payment_type');
        }
        if($request->input('role_sort') == "manager"){
            $workers = $workers->where('role_type', "manager");
        }
        if($request->input('role_sort') == "admin"){
            $workers = $workers->where('role_type', "admin");
        }
        if($request->input('role_sort') == "employee"){
            $workers = $workers->where('role_type', "employee");
        }
        return view('workers.index', compact('workers') );
    }
    public function add()
    {
        return view('workers.add');
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

        $workers = Worker::all();
        return view('workers.index', compact('workers') );
    }
    public function autoAdd()
    {
        Worker::factory()->count(10)->create();
        return view('workers.add');
    }
    public function loadMore(Request $request)
    {
        $posts = Post::latest()->paginate(10);

        return response()->json([
            'posts' => $posts->items(),
            'next_page_url' => $posts->nextPageUrl()
        ]);
    }

}
