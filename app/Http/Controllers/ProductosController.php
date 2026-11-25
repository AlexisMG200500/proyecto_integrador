<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
  public function productos(){
    $productos = Producto::all();
    return view('productos.productos')->with('productos',$productos);
  }

  public function alta_producto(){
    return view('productos.nuevo');      
  }

  public function guardar_producto(Request $request){
    $producto = new Producto();
    $producto->producto = $request->producto;
    $producto->serie = $request->serie;
    $producto->caracteristicas = $request->caracteristicas;
    $producto->falla = $request->falla;
    $producto->cantidad = $request->cantidad;
    $producto->precio = $request->precio;
    $producto->save();
    return redirect()->route('productos');
  }

}
