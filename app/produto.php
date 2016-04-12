<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $fillable = array('id','nome','qtde','preco','custo','liberado','qtde_vendida');
}
