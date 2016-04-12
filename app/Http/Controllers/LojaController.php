<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\produto;
use Input, Redirect;
use App\Http\Requests;

class LojaController extends Controller
{
    public function getIndex()
    {
    	$destaques = Produto::where('destaque','=','S')->get();
    	return view('loja.index',compact('destaques'));
    }
}
