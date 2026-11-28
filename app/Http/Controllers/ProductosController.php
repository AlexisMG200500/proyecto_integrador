<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use PDF;
use Maatwebsite\Excel\Excel;
use App\Exports\ProductosExport;

class ProductosController extends Controller
{
  public function productos(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $productos = Producto::all();
      return view('productos.productos')->with('productos',$productos);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function alta_producto(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return view('productos.nuevo');    
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }  
  }

  public function guardar_producto(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $producto = new Producto();
      $producto->producto = $request->producto;
      $producto->serie = $request->serie;
      $producto->caracteristicas = $request->caracteristicas;
      $producto->falla = $request->falla;
      $producto->cantidad = $request->cantidad;
      $producto->precio = $request->precio;
      $producto->save();
      return redirect()->route('productos');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function producto_detalles($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $producto = Producto::find($id);
      return view('productos.detalle',compact('producto'));
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function producto_editar($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $producto = Producto::find($id);
      return view('productos.editar',compact('producto'));
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function producto_editado(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $producto = Producto::find($request->id);
      $producto->producto = $request->producto;
      $producto->serie = $request->serie;
      $producto->caracteristicas = $request->caracteristicas;
      $producto->falla = $request->falla;
      $producto->cantidad = $request->cantidad;
      $producto->precio = $request->precio;
      $producto->save();
      return redirect()->route('productos');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function producto_eliminar($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $producto = Producto::find($id);
      $producto->delete();
      return redirect()->route('productos');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function productos_pdf(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $productos = Producto::all();
      $pdf = PDF::loadView('productos.pdf', compact('productos'))->setPaper('a4','landscape');
      return $pdf->stream('productos');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  private $excel;

  public function __construct(Excel $excel){
    $this->excel = $excel;      
  }

  public function productos_export(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return $this->excel->download(new ProductosExport,'productos.xlsx');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }  
}
