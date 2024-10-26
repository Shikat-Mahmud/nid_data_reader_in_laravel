<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NidController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-nid', [NidController::class, 'showForm']);
Route::post('/upload-nid', [NidController::class, 'processUpload']);
