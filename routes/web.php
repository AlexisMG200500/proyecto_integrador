<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('/valida', [LoginController::class,'valida'])->name('valida');
Route::get('recuperar',[AccesoController::class,'recuperar'])->name('recuperar');
Route::post('restaurar', [AccesoController::class,'restaurar'])->name('restaurar');


/* Route::get('/', function () {
    return view('welcome');
}); */


