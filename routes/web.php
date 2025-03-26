<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Work_Controller;
use App\Http\Controllers\File_Controller;

Route::get('/list', [Work_Controller::class, 'index']);
Route::get('/auto_test_add', [Work_Controller::class, 'autoAdd']);
Route::get('/add_page', [Work_Controller::class, 'add']);
Route::post('/add_page', [Work_Controller::class, 'addInTo']);
Route::get('/upload', [File_Controller::class, 'uploader']);
Route::post('/upload', [File_Controller::class, 'writeFile']);
Route::get('/files', [File_Controller::class, 'storage']);
Route::post('/files', [File_Controller::class, 'delete']);
Route::post('/medalsChange', [File_Controller::class, 'achievementsChange']);
Route::post('/medals', [File_Controller::class, 'achievements']);