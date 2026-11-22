<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
  protected $table = 'empleados';
  protected $primaryKey = 'id';
  protected $fillable = ['id','nombre','apellido_paterno','apellido_materno','telefono','direccion'];
}
