<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use PDF;
use Maatwebsite\Excel\Excel;
use App\Exports\VentasExport;

class VentasController extends Controller
{
  public function ventas(){
    $ventas = Venta::all();
    return view('ventas.ventas')->with('ventas',$ventas);      
  }

  public function alta_venta(){
    return view('ventas.alta');
  }

  public function guardar_venta(Request $request){
    $venta = new Venta();
    $venta->venta = $request->venta;
    $venta->cantidad = $request->cantidad;
    $venta->precio = $request->precio;
    $venta->caracteristicas = $request->caracteristicas;
    $venta->descripcion = $request->descripcion;
    $venta->cliente = $request->cliente;
    $venta->save();
    return redirect()->route('ventas');

  }

  public function detalle_venta($id){
    $venta = Venta::find($id);
    return view('ventas.detalle',compact('venta'));      
  }
  
  public function modificar_venta($id){
    $venta = Venta::find($id);
    return view('ventas.modificar',compact('venta'));      
  }

  public function venta_modificada(Request $request){
    $venta = Venta::find($request->id);
    $venta->venta = $request->venta;      
    $venta->cantidad = $request->cantidad;      
    $venta->precio = $request->precio;      
    $venta->caracteristicas = $request->caracteristicas;      
    $venta->descripcion = $request->descripcion;      
    $venta->cliente = $request->cliente;
    $venta->save();
    return redirect()->route('ventas');      
  }

  public function venta_eliminada($id){
    $venta = Venta::find($id);
    $venta->delete();
    return redirect()->route('ventas');      
  }

  public function ventas_pdf(){
    $ventas = Venta::all();
    $pdf = PDF::loadView('ventas.pdf',compact('ventas'))->setPaper('a4','landscape');
    return $pdf->stream('ventas');
  }

  private $excel;

  public function __construct(Excel $excel){
    return $this->excel = $excel;      
  }

  public function ventas_export(){
    return $this->excel->download(new VentasExport,'ventas.xlsx');      
  }


}
