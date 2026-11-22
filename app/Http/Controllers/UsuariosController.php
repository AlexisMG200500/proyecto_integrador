<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

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
    $usuario->password = $request->password;
    $usuario->save();
    return redirect()->route('usuarios');
  }

}
