<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class usuario  extends Authenticatable
{
    protected $fillable = array('id','nome','email','senha','tipo_usuario','administrador','cliente','liberado');
}
