<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('/valida', [LoginController::class,'valida'])->name('valida');
Route::get('/cerrarsession', [LoginController::class,'cerrarsession'])->name('cerrarsession');
Route::get('/recuperar',[LoginController::class,'recuperar'])->name('recuperar');
Route::post('/restaurar', [LoginController::class,'restaurar'])->name('restaurar');
Route::get('/principal',[LoginController::class,'principal'])->name('principal');


/* Route::get('/', function () {
    return view('welcome');
}); */


