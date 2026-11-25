<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
class EmpleadosController extends Controller
{
  public function empleados(){
    $empleados = Empleado::all();
    return view('empleados.empleados')->with('empleados',$empleados);
  }

  public function alta_empleado(){
    return view('empleados.nuevo');
  }

  public function guardar_empleado(Request $request){
    $cliente = new Empleado();
    $cliente->nombre = $request->nombre;
    $cliente->apellido_paterno = $request->apellido_paterno;
    $cliente->apellido_materno = $request->apellido_materno;
    $cliente->telefono = $request->telefono;
    $cliente->direccion = $request->direccion;
    $cliente->save();
    return redirect()->route('empleados');
  }

  public function detalle_empleado($id){
    $empleado = Empleado::find($id);
    return view('empleados.detalle')->with('empleado',$empleado);
  }

  public function editar_empleado($id){
    $empleado = Empleado::find($id);
    return view('empleados.modificar')->with('empleado',$empleado);
  }

  public function empleado_editado(Request $request){
    $empleado = Empleado::find($request->id);
    $empleado->nombre = $request->nombre;
    $empleado->apellido_paterno = $request->apellido_paterno;
    $empleado->apellido_materno = $request->apellido_materno;
    $empleado->telefono = $request->telefono;
    $empleado->direccion = $request->direccion;
    $empleado->save();
    return redirect()->route('empleados');
  }

  public function eliminar_empleado($id){
    $empleado = Empleado::find($id);
    $empleado->delete();
    return redirect()->route('empleados');
  }


}
