<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiplosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/multiplos',[MultiplosController::class,'index']);
Route::post('/multiplos/procesar',[MultiplosController::class,'procesar']);
