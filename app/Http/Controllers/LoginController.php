<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Session;


class LoginController extends Controller
{
  public function login(){
    return view ('login');
  }
  
  public function valida(Request $request){
    $email = $request->email;
    $password = $request->password;
    
    $validated = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);
  
    $email = $validated['email'];
    $password = $validated['password'];
    
    $consulta = Usuario::where('email', '=', $email)->get();
    
    if (count($consulta) == 0 || !Hash::check($password, $consulta[0]->password)) {
      Session::flash('error', 'El usuario no existe o la contraseña no es correcta');
      return redirect()->route('login');
    }else{
      Session::put('sessionnombre',$consulta[0]->nombre);
      Session::put('sessionid',$consulta[0]->id);

      return redirect()->route('principal');

    }

    


  }

  public function cerrarsession(){
    Session::forget('sessionnombre');
    Session::forget('sessionid');
    Session::flush();
    Session::flash('error','Sesión cerrada correctamente');
    return redirect()->route('login');
  }

  public function recuperar(){
    
  }
  public function restaurar(){
    
  }

  public function principal(){

    $sessionnombre = session('sessionnombre');

    if($sessionnombre<>""){
      return view('layouts.app');
    }else{
      Session::flash('error','Debes iniciar sesión');
      return redirect()->route('login'); 
    }


  }


}
