<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Work_controller;

Route::get('/list', [Work_controller::class, 'index']);
Route::get('/auto_test_add', [Work_controller::class, 'autoAdd']);
Route::get('/add_page', [Work_controller::class, 'add']);
Route::post('/add_page', [Work_controller::class, 'add_INTO']);
    