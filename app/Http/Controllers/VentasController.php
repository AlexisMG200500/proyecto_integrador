<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use PDF;
use Maatwebsite\Excel\Excel;
use App\Exports\VentasExport;
use Session;

class VentasController extends Controller
{
  public function ventas(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $ventas = Venta::all();
      return view('ventas.ventas')->with('ventas',$ventas);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function alta_venta(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return view('ventas.alta');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function guardar_venta(Request $request){    
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $venta = new Venta();
      $venta->venta = $request->venta;
      $venta->cantidad = $request->cantidad;
      $venta->precio = $request->precio;
      $venta->caracteristicas = $request->caracteristicas;
      $venta->descripcion = $request->descripcion;
      $venta->cliente = $request->cliente;
      $venta->save();
      return redirect()->route('ventas');     
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function detalle_venta($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $venta = Venta::find($id);
      return view('ventas.detalle',compact('venta'));
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }
  
  public function modificar_venta($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $venta = Venta::find($id);
      return view('ventas.modificar',compact('venta'));
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function venta_modificada(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $venta = Venta::find($request->id);
      $venta->venta = $request->venta;      
      $venta->cantidad = $request->cantidad;      
      $venta->precio = $request->precio;      
      $venta->caracteristicas = $request->caracteristicas;      
      $venta->descripcion = $request->descripcion;      
      $venta->cliente = $request->cliente;
      $venta->save();
      return redirect()->route('ventas');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function venta_eliminada($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $venta = Venta::find($id);
      $venta->delete();
      return redirect()->route('ventas');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function ventas_pdf(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $ventas = Venta::all();
      $pdf = PDF::loadView('ventas.pdf',compact('ventas'))->setPaper('a4','landscape');
      return $pdf->stream('ventas');  
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  private $excel;

  public function __construct(Excel $excel){
    return $this->excel = $excel;      
  }

  public function ventas_export(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return $this->excel->download(new VentasExport,'ventas.xlsx');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }
}
