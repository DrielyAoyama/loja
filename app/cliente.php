<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class cliente extends Authenticatable
{
    protected $fillable = array('id','razao','nome','cnpjcpf','liberado');
}
