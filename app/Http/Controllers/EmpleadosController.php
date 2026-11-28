<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use PDF;
use Maatwebsite\Excel\Excel;
use App\Exports\EmpleadosExport;

class EmpleadosController extends Controller
{
  public function empleados(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $empleados = Empleado::all();
      return view('empleados.empleados')->with('empleados',$empleados);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function alta_empleado(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return view('empleados.nuevo');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function guardar_empleado(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $cliente = new Empleado();
      $cliente->nombre = $request->nombre;
      $cliente->apellido_paterno = $request->apellido_paterno;
      $cliente->apellido_materno = $request->apellido_materno;
      $cliente->telefono = $request->telefono;
      $cliente->direccion = $request->direccion;
      $cliente->save();
      return redirect()->route('empleados');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function detalle_empleado($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $empleado = Empleado::find($id);
      return view('empleados.detalle')->with('empleado',$empleado);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function editar_empleado($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $empleado = Empleado::find($id);
      return view('empleados.modificar')->with('empleado',$empleado);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function empleado_editado(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $empleado = Empleado::find($request->id);
      $empleado->nombre = $request->nombre;
      $empleado->apellido_paterno = $request->apellido_paterno;
      $empleado->apellido_materno = $request->apellido_materno;
      $empleado->telefono = $request->telefono;
      $empleado->direccion = $request->direccion;
      $empleado->save();
      return redirect()->route('empleados');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function eliminar_empleado($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $empleado = Empleado::find($id);
      $empleado->delete();
      return redirect()->route('empleados');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function empleados_pdf(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $empleados = Empleado::all();
      $pdf = PDF::loadView('empleados.pdf',compact('empleados'))->setPaper('a4','landscape');
      return $pdf->stream('empleados');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  private $excel;

  public function __construct(Excel $excel){
    $this->excel = $excel;
  }

  public function empleados_export(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return $this->excel->download(new EmpleadosExport,'empleados.xlsx');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }



  


}
