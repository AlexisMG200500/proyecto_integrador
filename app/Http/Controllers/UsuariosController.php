<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use PDF;
use Maatwebsite\Excel\Excel;
use App\Exports\UsuariosExport;
use Session;

class UsuariosController extends Controller
{
  public function usuarios(Request $request){  
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $usuarios = Usuario::all();
      return view('usuarios.usuarios')->with('usuarios',$usuarios);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function alta_usuario(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return view ('usuarios.nuevo');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function guardar_usuario(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $usuario = new Usuario();
      $usuario->nombre = $request->nombre;
      $usuario->usuario = $request->usuario;
      $usuario->email = $request->email;
      $usuario->password = Hash::make($request->password);
      $usuario->save();
      return redirect()->route('usuarios');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function usuario_detalle($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $usuario = Usuario::find($id);
      return view('usuarios.detalle')->with('usuario',$usuario);    
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }    
  }

  public function editar_usuario($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $usuario = Usuario::find($id);
      return view('usuarios.editar')->with('usuario',$usuario);
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function usuario_editado(Request $request){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $usuario=Usuario::find($request->id);
      $usuario->nombre = $request->nombre;
      $usuario->usuario = $request->usuario;
      $usuario->email = $request->email;
      if ($request->filled('password')) {
        $usuario->password = Hash::make($request->password);
      }
      $usuario->save();
      return redirect()->route('usuarios');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function pdf_usuarios(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $usuarios = Usuario::all();
      $pdf = PDF::loadView('usuarios.pdf', compact('usuarios'))->setPaper('a4', 'landscape');;
      return $pdf -> stream('usuarios');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  private $excel;
  public function __construct(Excel $excel){
    $this->excel = $excel;
  }

  public function usuarios_export(){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      return $this->excel->download(new UsuariosExport,'usuarios.xlsx');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }

  public function eliminar_usuario($id){
    $sessionid = session('sessionid');
    $sessionnombre = session('sessionnombre');
    if($sessionnombre<>"" && $sessionid<>""){
      $usuario = Usuario::find($id);
      $usuario->delete();
      return redirect()->route('usuarios');    
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }
  }


}
