<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;

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
Route::get('/usuario_detalle/{id}',[App\Http\Controllers\UsuariosController::class,'usuario_detalle'])->name('usuario_detalle');
Route::get('/editar_usuario/{id}',[App\Http\Controllers\UsuariosController::class,'editar_usuario'])->name('editar_usuario');
Route::put('/usuario_editado',[App\Http\Controllers\UsuariosController::class,'usuario_editado'])->name('usuario_editado');
Route::get('/pdf_usuarios',[App\Http\Controllers\UsuariosController::class,'pdf_usuarios'])->name('pdf_usuarios');
Route::get('/usuarios_export',[App\Http\Controllers\UsuariosController::class,'usuarios_export'])->name('usuarios_export');
Route::delete('/eliminar_usuario/{id}',[App\Http\Controllers\UsuariosController::class,'eliminar_usuario'])->name('eliminar_usuario');

// ! Clientes
Route::prefix('/clientes')->group(function () {
    Route::get('/',[App\Http\Controllers\ClientesController::class,'clientes'])->name('clientes');
    Route::get('/alta_cliente',[App\Http\Controllers\ClientesController::class,'alta_cliente'])->name('alta_cliente');
    Route::post('/guardar_cliente',[App\Http\Controllers\ClientesController::class,'guardar_cliente'])->name('guardar_cliente');
    Route::get('/detalle_cliente/{id}',[App\Http\Controllers\ClientesController::class,'detalle_cliente'])->name('detalle_cliente');
    Route::get('/modificar_cliente/{id}',[App\Http\Controllers\ClientesController::class,'modificar_cliente'])->name('modificar_cliente');
    Route::put('/cliente_modificado',[App\Http\Controllers\ClientesController::class,'cliente_modificado'])->name('cliente_modificado');
    Route::delete('/eliminar_cliente/{id}',[App\Http\Controllers\ClientesController::class,'eliminar_cliente'])->name('eliminar_cliente');
    Route::get('/pdf_clientes', [App\Http\Controllers\ClientesController::class,'pdf_clientes'])->name('pdf_clientes');
    Route::get('/clientes_export', [App\Http\Controllers\ClientesController::class,'clientes_export'])->name('clientes_export');
});

// ! Empleados
Route::prefix('/empleados')->group(function () {
    Route::get('/',[EmpleadosController::class,'empleados'])->name('empleados');
    Route::get('/alta_empleado',[EmpleadosController::class,'alta_empleado'])->name('alta_empleado');
    Route::post('/guardar_empleado',[EmpleadosController::class,'guardar_empleado'])->name('guardar_empleado');
    Route::get('/detalle_empleado/{id}',[EmpleadosController::class,'detalle_empleado'])->name('detalle_empleado');
    Route::get('/editar_empleado/{id}',[EmpleadosController::class,'editar_empleado'])->name('editar_empleado');
    Route::put('/empleado_editado',[EmpleadosController::class,'empleado_editado'])->name('empleado_editado');
    Route::delete('/eliminar_empleado/{id}',[EmpleadosController::class,'eliminar_empleado'])->name('eliminar_empleado');
    Route::get('/empleados_pdf',[EmpleadosController::class,'empleados_pdf'])->name('empleados_pdf');
    Route::get('/empleados_export',[EmpleadosController::class,'empleados_export'])->name('empleados_export');
});

//! Productos
Route::prefix('productos')->group(function () {
    Route::get('/',[ProductosController::class,'productos'])->name('productos');
    Route::get('/alta_producto',[ProductosController::class,'alta_producto'])->name('alta_producto');
    Route::post('/guardar_producto',[ProductosController::class,'guardar_producto'])->name('guardar_producto');
    Route::get('/producto_detalles/{id}',[ProductosController::class,'producto_detalles'])->name('producto_detalles');
    Route::get('/producto_editar/{id}',[ProductosController::class,'producto_editar'])->name('producto_editar');
    Route::put('/producto_editado',[ProductosController::class,'producto_editado'])->name('producto_editado');
    Route::delete('/producto_eliminar/{id}',[ProductosController::class,'producto_eliminar'])->name('producto_eliminar');
    Route::get('/productos_pdf',[ProductosController::class,'productos_pdf'])->name('productos_pdf');
    Route::get('/productos_export',[ProductosController::class,'productos_export'])->name('productos_export');
}); 

Route::prefix('ventas')->group(function () {
    Route::get('/', [VentasController::class,'ventas'])->name('ventas');
    Route::get('/alta_venta',[VentasController::class,'alta_venta'])->name('alta_venta');    
    Route::post('/guardar_venta',[VentasController::class,'guardar_venta'])->name('guardar_venta');    
    Route::get('/detalle_venta/{id}',[VentasController::class,'detalle_venta'])->name('detalle_venta');    
    Route::get('/modificar_venta/{id}',[VentasController::class,'modificar_venta'])->name('modificar_venta');
    Route::put('/venta_modificada',[VentasController::class,'venta_modificada'])->name('venta_modificada');    
    Route::delete('/venta_eliminada/{id}',[VentasController::class,'venta_eliminada'])->name('venta_eliminada');    
    Route::get('/ventas_pdf',[VentasController::class,'ventas_pdf'])->name('ventas_pdf');
    Route::get('/ventas_export',[VentasController::class,'ventas_export'])->name('ventas_export');
});



/* Route::get('/', function () {
    return view('welcome');
}); */


