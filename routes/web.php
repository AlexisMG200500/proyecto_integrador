<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class,'login'])->name('login');


/* Route::get('/', function () {
    return view('welcome');
}); */


