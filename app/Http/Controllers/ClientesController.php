<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use PDF;
use Maatwebsite\Excel\Excel;
use App\Exports\ClientesExport;
use Session;

class ClientesController extends Controller
{
  public function clientes(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $clientes = Cliente::all();
      return view('clientes.clientes')->with('clientes',$clientes);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function alta_cliente(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return view ('clientes.nuevo');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function guardar_cliente(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $cliente = new Cliente();
      $cliente->nombre = $request->nombre;
      $cliente->apellido_paterno = $request->apellido_paterno;    
      $cliente->apellido_materno = $request->apellido_materno;    
      $cliente->email = $request->email;    
      $cliente->telefono = $request->telefono;    
      $cliente->direccion = $request->direccion;
      $cliente->save();
      return redirect()->route('clientes');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function detalle_cliente($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $cliente = Cliente::find($id);
      return view('clientes.detalle')->with('cliente',$cliente);
      // return $cliente;
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function modificar_cliente($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $cliente = Cliente::find($id);
      return view('clientes.modificar')->with('cliente',$cliente);
      // return $cliente;
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function cliente_modificado(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $cliente = Cliente::find($request->id);
      $cliente->nombre = $request->nombre;    
      $cliente->apellido_paterno = $request->apellido_paterno;    
      $cliente->apellido_materno = $request->apellido_materno;    
      $cliente->email = $request->email;    
      $cliente->telefono = $request->telefono;    
      $cliente->direccion = $request->direccion;
      $cliente->save();
      return redirect()->route('clientes');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function eliminar_cliente($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $cliente = Cliente::find($id);
      $cliente->delete();
      return redirect()->route('clientes');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function pdf_clientes(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $clientes = Cliente::all();
      $pdf = PDF::loadView('clientes.pdf',compact('clientes'))->setPaper('a4','landscape');
      return $pdf->stream('clientes');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  private $excel;
  public function __construct(Excel $excel){
    $this->excel = $excel;
  }

  public function clientes_export(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return $this->excel->download(new ClientesExport,'clientes.xlsx');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

}