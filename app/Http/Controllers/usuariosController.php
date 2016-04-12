<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Cliente;
use App\Http\Requests;
use Input, Redirect;
use Validator;
use App\Profile;
use DB;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class usuariosController extends Controller
{
	protected $table = 'usuarios';

	
    public function getIndex()
    {	
    	$usuarios = Usuario::leftjoin('clientes','clientes.id','=','usuarios.cliente')
	    	->select('usuarios.id','usuarios.nome','usuarios.email','usuarios.tipo_usuario','usuarios.administrador','usuarios.liberado','clientes.razao','usuarios.cliente')
	    		->orwhere('usuarios.email','!=','root')
			    	->orderBy('id')
			    		->paginate(5);
    	return view('/adm/usuarios.index',compact('usuarios'));
    }

    public function postIndex(Request $request)
    {
    	$usuarios = Usuario::leftjoin('clientes','clientes.id','=','usuarios.cliente')
	    	->select('usuarios.id','usuarios.nome','usuarios.email','usuarios.tipo_usuario','usuarios.administrador','usuarios.liberado','clientes.razao','usuarios.cliente')
	    		->where('usuarios.email','like','%'.strtoupper($request->input('filtro')).'%')
	    			->orwhere('usuarios.nome','like','%'.strtoupper($request->input('filtro')).'%')
	    				->orwhere('usuarios.id','like','%'.strtoupper($request->input('filtro')).'%')
	    					->orwhere('clientes.razao','like','%'.strtoupper($request->input('filtro')).'%')
				    			    ->orderBy('id')
				    				    ->paginate(5); 
	    	return view('/adm/usuarios.index',compact('usuarios'));
    }

    public function postCreate()
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
		    return view('/adm/usuarios.create',compact('empresas'));
		}
		else
		{
			return Redirect::to(asset('/adm/usuarios'));
		}
	}

	public function postStore(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$dados = $request->input();
			$dados['senha'] = md5($dados['senha']);
			Usuario::create($dados);
		}
		return Redirect::to(asset($request->input('retorno')));

	}

	public function getBloquear($id)
	{
		if((Auth::user()->id!=$id)&&(Auth::user()->administrador=='S'))
		{
			$usuario = Usuario::findOrFail($id);
			if($usuario->email!='root') 
			{				
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
		}
		// return Redirect::to(asset('/adm/usuarios'));
		return redirect()->back();
	}	

	public function getAdministrador($id)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$usuario = Usuario::findOrFail($id);
			if($usuario->email!='root') 
			{
				if($usuario->administrador=="S")
				{
					if ($qtde = count(Usuario::where('administrador','=','S')->where('id','!=',$id)->get())>0)
				   		 $usuario->administrador="N";
				}
				else
				{
					$usuario->administrador="S";
				}
				$usuario->save();
			}
		}
		return Redirect::to(asset('/adm/usuarios'));
	}	

	public function postUpdate(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$usuario = Usuario::findOrFail($request->input('id'));
			$usuario->fill($request->input())->save();
		}
		return Redirect::to(asset('/adm/usuarios'));
	}

	public function getDestroy($id)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			if((Auth::user()->id!=$id)&&(   Usuario::where('liberado','=','S')->count()>0  ))
			{
				$usuario = Usuario::findOrFail($id);
				if ($usuario->nome!='administrador')
				{
					$usuario->delete();
				}
			}
		}
		return Redirect::to(asset('/adm/usuarios'));
	}

	public function getShow($id) 
	{
		$usuarios = Usuario::where('id','=',$id)->get();
		$operation ="show";
		return view('/adm/usuarios.edit',compact('usuarios','operation'));
	}

	public function getEdit($id) 
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$usuarios = Usuario::where('id','=',$id)->get();
			$operation ="edit";
			return view('/adm/usuarios.edit',compact('usuarios','operation'));
		}				
	}


	
}
