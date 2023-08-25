<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\statisticasController; 


Route::get('/', function () {
    return view('welcome');
});

Route::get('/statisticas', [statisticasController::class, 'index']);
