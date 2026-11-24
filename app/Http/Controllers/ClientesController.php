<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use PDF;

class ClientesController extends Controller
{
  public function clientes(){
    $clientes = Cliente::all();
    return view('clientes.clientes')->with('clientes',$clientes);
  }

  public function alta_cliente(){
    return view ('clientes.nuevo');
  }

  public function guardar_cliente(Request $request){
    $cliente = new Cliente();
    $cliente->nombre = $request->nombre;
    $cliente->apellido_paterno = $request->apellido_paterno;    
    $cliente->apellido_materno = $request->apellido_materno;    
    $cliente->email = $request->email;    
    $cliente->telefono = $request->telefono;    
    $cliente->direccion = $request->direccion;
    $cliente->save();
    return redirect()->route('clientes');
  }

  public function detalle_cliente($id){
    $cliente = Cliente::find($id);
    return view('clientes.detalle')->with('cliente',$cliente);
    // return $cliente;
  }

  public function modificar_cliente($id){
    $cliente = Cliente::find($id);
    return view('clientes.modificar')->with('cliente',$cliente);
    // return $cliente;
  }

  public function cliente_modificado(Request $request){
    $cliente = Cliente::find($request->id);
    $cliente->nombre = $request->nombre;    
    $cliente->apellido_paterno = $request->apellido_paterno;    
    $cliente->apellido_materno = $request->apellido_materno;    
    $cliente->email = $request->email;    
    $cliente->telefono = $request->telefono;    
    $cliente->direccion = $request->direccion;
    $cliente->save();
    return redirect()->route('clientes');
  }

  public function eliminar_cliente($id){
    $cliente = Cliente::find($id);
    $cliente->delete();
    return redirect()->route('clientes');
  }

  public function pdf_clientes(){
    $clientes = Cliente::all();
    $pdf = PDF::loadView('clientes.pdf',compact('clientes'))->setPaper('a4','landscape');
    return $pdf->stream('clientes');
  }

}
