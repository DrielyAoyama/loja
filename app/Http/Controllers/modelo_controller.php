<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo_Model;
use App\Http\Requests;

class ModeloController extends Controller
{
    public function getIndex()
    {
    	return view('modelo.index');
    }
}
