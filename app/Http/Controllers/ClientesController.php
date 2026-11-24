<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

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

}
