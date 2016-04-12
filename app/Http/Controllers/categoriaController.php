<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;
use App\Subcategoria;
use App\Subsubcategoria;
use App\Http\Requests;
use Input, Redirect;
use Auth;

class categoriaController extends Controller
{
    public function getIndex()
    {
    	$categorias = Categoria::orderBy('id')
			    		->paginate(5);
    	return view('/adm/categorias.index',compact('categorias'));
    }

    public function postIndex(Request $request)
    {
    	$categorias = Categoria::where('descricao','like', '%'.strtoupper($request->input('filtro')).'%')
    		->orwhere('id','=', $request->input('filtro'))
    			->paginate(5);
    	return view('/adm/categorias.index',compact('categorias'));
    }

    public function getCreate()
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
		    return view('/adm/categorias.create');
		}
		else
		{
			return Redirect::to(asset('/adm/categorias'));
		}
	}

	public function postStore(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categorias = Categoria::where('descricao','=',strtoupper($request->input('descricao')))->get();
			if (count($categorias)<=0)
			{
				$dados = $request->input();
				Categoria::create($dados);
			}
		}
		return Redirect::to(asset('/adm/categorias'));
	}

	public function postUpdate(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categoria = Categoria::findOrFail($request->input('id'));
			$categoria->fill($request->input())->save();
		}
		return Redirect::to(asset('/adm/categorias'));
	}	

	public function getDestroy($id)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categoria = Categoria::findOrFail($id);
			$categoria->delete();
		}
		return Redirect::to(asset('/adm/categorias'));
	}

	

	public function getShow($id) 
	{
		$categorias = Categoria::where('id','=',$id)->get();
		return view('/adm/categorias.show',compact('categorias'));
	}

	public function getEdit($id) 
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categorias = Categoria::where('id','=',$id)->get();
			return view('/adm/categorias.edit',compact('categorias'));
		}				
	}


	///////////////////////////////

	public function getSubcategoria($categoria)
	{
		$subcategorias = Subcategoria::where('categoria','=', $categoria)->paginate(5);	
		$categorias = Categoria::where('id','=', $categoria)->get();	
		return view('/adm/categorias.subcategorias',compact('subcategorias','categorias'));
	}

	public function getSubcreate($categoria)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categorias = Categoria::where('id','=', $categoria)->get();
			foreach ($categorias as $categoria) 
					$idcategoria = $categoria->id;
		    return view('/adm/categorias.subcreate',compact('categorias','idcategoria'));
		}
		else
		{
			return Redirect::to(asset("/adm/categorias/subcategoria/$id"));
		}
	}

	public function postSubstore(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			
				$dados = $request->input();
				$categoria =$request->input('categoria');
				Subcategoria::create($dados);
				return Redirect::to(asset("/adm/categorias/subcategoria/$categoria"));			
		}
		
	}

	public function getSubdestroy($id)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$subcategoria = Subcategoria::where('id','=', $id);
			$subcategoria->delete();
		}
		return redirect()->back();
	}

	public function getSubedit($id) 
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$subcategorias = Subcategoria::leftjoin('categorias','categorias.id','=','subcategorias.categoria')
				->select('subcategorias.id','subcategorias.categoria','subcategorias.descricao','categorias.descricao as descricaocategoria')
					->where('subcategorias.id','=', $id)
						->get();			
			return view('/adm/categorias.subedit',compact('subcategorias'));
		}				
	}

	public function postSubupdate(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categoria = Subcategoria::findOrFail($request->input('id'))->fill($request->input())->save();
		}
		return Redirect::to(asset("adm/categorias/subcategoria/".$request->input('categoria')));
	}	


////////////////////////////////////////////////


	public function getSubsubcategoria($subcategoria)
	{
		$subsubcategorias = Subsubcategoria::where('subcategoria','=', $subcategoria)->paginate(5);	
		$subcategorias    = Subcategoria::where('id','=',$subcategoria)->get();
		foreach ($subcategorias as $subcategoria) 
		{
			$idcategoria = $subcategoria->categoria;
			$idsubcategoria = $subcategoria->id;
			$descricaosubcategoria = $subcategoria->descricao;
		}
		$categorias    = Categoria::where('id','=',$idcategoria)->get();
		foreach ($categorias as $categoria) 
			$descricaocategoria = $categoria->descricao;
		return view('/adm/categorias.subsubcategorias',compact('subsubcategorias','idcategoria','idsubcategoria','descricaosubcategoria','descricaocategoria'));
	}

	public function getSubsubcreate($subcategoria)
	{
		$subsubcategorias = Subsubcategoria::where('subcategoria','=', $subcategoria)->get();	
		$subcategorias    = Subcategoria::where('id','=',$subcategoria)->get();
		foreach ($subcategorias as $subcategoria) 
		{
			$idcategoria = $subcategoria->categoria;
			$idsubcategoria = $subcategoria->id;
			$descricaosubcategoria = $subcategoria->descricao;
		}
		$categorias    = Categoria::where('id','=',$idcategoria)->get();
		foreach ($categorias as $categoria) 
			$descricaocategoria = $categoria->descricao;
		return view('/adm/categorias.subsubcreate',compact('subsubcategorias','idcategoria','idsubcategoria','descricaosubcategoria','descricaocategoria'));
	}

	public function postSubssubstore(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
				$dados = $request->input();
				$subcategoria =$request->input('subcategoria');
				Subsubcategoria::create($dados);
				return Redirect::to(asset("/adm/categorias/subsubcategoria/$subcategoria"));		
		}
		
	}

	public function getSubsubdestroy($id)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$subcategoria = Subsubcategoria::where('id','=', $id);
			$subcategoria->delete();
		}
		return redirect()->back();
	}

	public function getSubsubedit($id) 
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$subsubcategorias = Subsubcategoria::where('id','=', $id)->get();	
			foreach ($subsubcategorias as $subsubcategoria) 
				$idsubcategoria = $subsubcategoria->subcategoria;
			$subcategorias = Subcategoria::where('id','=',$idsubcategoria);
			foreach ($subcategorias as $subcategoria) 
				$descricaosubcategoria = $subcategoria->descricao;

			return view('/adm/categorias.subsubedit',compact('subsubcategorias','idsubcategoria'));
		}				
	}

	public function postSubsubupdate(Request $request)
	{
		if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
		{
			$categoria = Subsubcategoria::findOrFail($request->input('id'))->fill($request->input())->save();
		}
		return Redirect::to(asset("adm/categorias/subsubcategoria/".$request->input('subcategoria')));
	}	
}
