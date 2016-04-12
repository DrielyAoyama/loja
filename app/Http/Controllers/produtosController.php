<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\produto;
use App\categoria;
use Input, Redirect;
use Auth;

class produtosController extends Controller
{
    public function getIndex()
    {
    	$produtos = Produto::orderBy('id')
			    		->paginate(5);
    	return view('/adm/produtos.index',compact('produtos'));
    }

    public function postIndex(Request $request)
    {
    	$produtos = Produto::where('nome','like', '%'.strtoupper($request->input('filtro')).'%')
    		->orwhere('id','=', $request->input('filtro'))
    			->paginate(5);
    	return view('/adm/produtos.index',compact('produtos'));
    }

    public function getCreate()
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categorias = categoria::orderBy('id')->get();
		    return view('/adm/produtos.create',compact('categorias'));
		}
		else
		{
			return Redirect::to(asset('/adm/produtos'));
		}
	}

	public function postStore(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$dados = $request->input();
			Produto::create($dados);
		}
		return Redirect::to(asset('/adm/produtos'));
	}

	public function getBloquear($id)
	{
		if(Auth::user()->administrador=='S')
		{
			$usuario = Produto::findOrFail($id);
			if($usuario->liberado=="S")
			{
				$usuario->liberado="N";
			}
			else
			{
				$usuario->liberado="S";
			}
			$usuario->save();			
		}
		return Redirect::to(asset('/adm/produtos'));
	}

	public function postUpdate(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$usuario = Produto::findOrFail($request->input('id'));
			$usuario->fill($request->input())->save();
		}
		return Redirect::to(asset('/adm/produtos'));
	}	

	public function getDestroy($id)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$produto = Produto::findOrFail($id);
			$produto->delete();
		}
		return Redirect::to(asset('/adm/produtos'));
	}

	public function getShow($id) 
	{
		$produtos = Produto::where('id','=',$id)->get();
		$operation ="show";
		return view('/adm/produtos.show',compact('produtos','operation'));
	}

	public function getEdit($id) 
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$produtos = Produto::where('id','=',$id)->get();
			$operation ="edit";
			return view('/adm/produtos.edit',compact('produtos','operation'));
		}				
	}

}
