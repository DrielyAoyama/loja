<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
   protected $fillable = array('id','categoria','descricao');
}
