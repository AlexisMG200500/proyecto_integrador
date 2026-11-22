<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table = 'clientes';
  protected $primaryKey = 'id';
  protected $fillable = ['id','nombre','apellido_paterno','apellido_materno','email','telefono','direccion'];    
}
