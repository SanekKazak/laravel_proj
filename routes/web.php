<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Work_controller;

Route::get('/w', [Work_controller::class, 'index']);
    