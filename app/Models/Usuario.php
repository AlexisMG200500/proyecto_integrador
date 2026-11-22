<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  protected $table = 'usuarios';
  protected $primaryKey = 'id';
  protected $fillable = ['id','nombre','usuario','email','password'];
  
}
