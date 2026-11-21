<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aprendiz extends Model
{
  protected $table = 'aprendices';
  protected $fillable = ['nombre', 'programa'];

}
