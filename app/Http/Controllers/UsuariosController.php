<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use PDF;

class UsuariosController extends Controller
{
  public function usuarios(Request $request){
    $usuarios = Usuario::all();
    return view('usuarios.usuarios')->with('usuarios',$usuarios);
  }

  public function alta_usuario(){
    return view ('usuarios.nuevo');
  }

  public function guardar_usuario(Request $request){
    $usuario = new Usuario();
    $usuario->nombre = $request->nombre;
    $usuario->usuario = $request->usuario;
    $usuario->email = $request->email;
    $usuario->password = Hash::make($request->password);
    $usuario->save();
    return redirect()->route('usuarios');
  }

  public function usuario_detalle($id){
    $usuario = Usuario::find($id);
    return view('usuarios.detalle')->with('usuario',$usuario);        
  }

  public function editar_usuario($id){
    $usuario = Usuario::find($id);
    return view('usuarios.editar')->with('usuario',$usuario);
  }

  public function usuario_editado(Request $request){
    $usuario=Usuario::find($request->id);
    $usuario->nombre = $request->nombre;
    $usuario->usuario = $request->usuario;
    $usuario->email = $request->email;
    if ($request->filled('password')) {
      $usuario->password = Hash::make($request->password);
    }
    $usuario->save();
    return redirect()->route('usuarios');
  }

  public function pdf_usuarios(){
    $usuarios = Usuario::all();
    $pdf = PDF::loadView('usuarios.pdf', compact('usuarios'))->setPaper('a4', 'landscape');;
    return $pdf -> stream('usuarios');
  }




}
