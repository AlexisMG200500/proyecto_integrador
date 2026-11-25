<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use PDF;

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

  public function producto_detalles($id){
    $producto = Producto::find($id);
    return view('productos.detalle',compact('producto'));    
  }

  public function producto_editar($id){
    $producto = Producto::find($id);
    return view('productos.editar',compact('producto'));   
  }

  public function producto_editado(Request $request){
    $producto = Producto::find($request->id);
    $producto->producto = $request->producto;
    $producto->serie = $request->serie;
    $producto->caracteristicas = $request->caracteristicas;
    $producto->falla = $request->falla;
    $producto->cantidad = $request->cantidad;
    $producto->precio = $request->precio;
    $producto->save();
    return redirect()->route('productos');
  }

  public function producto_eliminar($id){
    $producto = Producto::find($id);
    $producto->delete();
    return redirect()->route('productos');      
  }

  public function productos_pdf(){
    $productos = Producto::all();
    $pdf = PDF::loadView('productos.pdf', compact('productos'))->setPaper('a4','landscape');
    return $pdf->stream('productos');
  }


}
