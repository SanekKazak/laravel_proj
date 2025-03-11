<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Work_controller;

Route::get('/list', [Work_controller::class, 'index']);
Route::get('/home', [Work_controller::class, 'home']);
Route::get('/add_page', [Work_controller::class, 'add']);
Route::post('/add_page', [Work_controller::class, 'add_INTO']);
    