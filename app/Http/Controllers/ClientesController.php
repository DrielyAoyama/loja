<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Usuario;
use App\Http\Requests;
use Input, Redirect;
use App\Profile;
use Auth;
use DB;

class clientesController extends Controller
{
    public function getIndex()
    {
    	if(Auth::user()->tipo_usuario=='ADMIN')
    	{
	    	$clientes = Cliente::where('id','!=','0')
	    		->orderBy('id')->paginate(5);
	    	return view('/adm/clientes.index',compact('clientes'));
	    }
   		elseif(Auth::user()->tipo_usuario=='CLIENTE')
   		{
   			return Redirect::to(asset('auth/logout'));
   		}
    }

    public function postIndex(Request $request)
    {
    	if(Auth::user()->tipo_usuario=='ADMIN')
    	{
	    	$clientes = Cliente::where('razao','like','%'.strtoupper($request->input('filtro')).'%')
	    		->orwhere('nome','like','%'.strtoupper($request->input('filtro')).'%')
	    			->orwhere('cnpjcpf','like','%'.strtoupper($request->input('filtro')).'%')
	    			    ->orwhere('id','like','%'.strtoupper($request->input('filtro')).'%')
			    				->orderBy('id')
			    					->paginate(5);    	
	    	return view('/adm/clientes.index',compact('clientes'));
	    }
   		elseif(Auth::user()->tipo_usuario=='CLIENTE')
   		{

   		}
    }

   
    public function getCreate()
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			return view('/adm/clientes.create');
		}
		else
		{
			return Redirect::to(asset('/adm/clientes'));
		}
	}

	public function postStore(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
		    Cliente::create($request->input());
		}		
		return Redirect::to(asset('/adm/clientes'));
	}

	public function postUpdate(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$Cliente = Cliente::findOrFail($request->input('id'));
			$Cliente->fill($request->input())->save();
	    }
		return Redirect::to(asset('/adm/clientes'));
	}

	public function getDestroy($id)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$cliente = Cliente::findOrFail($id)->delete();
			$usuario = Usuario::where('cliente','=',$id)->delete();
		}
		return Redirect::to(asset('/adm/clientes'));
	}

	public function getShow($id) 
	{
			$usuarios = Usuario::where('cliente','=',$id)->get();		
			$clientes = cliente::where('id','=',$id)->get();
			$operation ="show";
			return view('/adm/clientes.edit',compact('clientes','operation','usuarios'));
	}

	public function getEdit($id) 
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
	    {
	    	$usuarios = Usuario::where('cliente','=',$id)->get();		
			$clientes = cliente::where('id','=',$id)->get();
			$operation ="edit";
			return view('/adm/clientes.edit',compact('clientes','operation','usuarios'));
		}			
	}

	public function getBloquear($id)
	{
		if(Auth::user()->administrador=='S')
		{
			$cliente = Cliente::findOrFail($id);
			if($cliente->liberado=="S")
			{
				$cliente->liberado="N";
			}
			else
			{
				$cliente->liberado="S";
			}
			$cliente->save();
		}
		return Redirect::to(asset('/adm/clientes'));
	}	

}

