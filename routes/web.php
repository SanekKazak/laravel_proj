<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Work_controller;

Route::get('/test_bd', [Work_controller::class, 'index']);
