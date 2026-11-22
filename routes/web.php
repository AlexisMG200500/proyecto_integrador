<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class,'login'])->name('login');
Route::post('/valida', [LoginController::class,'valida'])->name('valida');
Route::get('/cerrarsession', [LoginController::class,'cerrarsession'])->name('cerrarsession');
Route::get('/recuperar',[LoginController::class,'recuperar'])->name('recuperar');
Route::post('/restaurar', [LoginController::class,'restaurar'])->name('restaurar');
Route::get('/principal',[LoginController::class,'principal'])->name('principal');

// ! Usuarios
Route::get('/usuarios',[App\Http\Controllers\UsuariosController::class,'usuarios'])->name('usuarios');
Route::get('/alta_usuario',[App\Http\Controllers\UsuariosController::class,'alta_usuario'])->name('alta_usuario');
Route::post('/guardar_usuario',[App\Http\Controllers\UsuariosController::class,'guardar_usuario'])->name('guardar_usuario');


/* Route::get('/', function () {
    return view('welcome');
}); */


