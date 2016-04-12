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
    	$qtde_vendida = Produto::where('liberado','=','S')
    		->orderby('qtde_vendida')->take(30)
    			->get();
    	return view('loja.index',compact('qtde_vendida'));
    }
}
