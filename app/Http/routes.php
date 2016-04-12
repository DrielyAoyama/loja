<?php


Route::controller('auth', 'Auth\AuthController');


Route::get('painel', function ()
{
    return view('adm/login');
});
Route::get('adm/painel', function ()
{
    return view('adm/login');
});



Route::group(['middleware' => 'auth.check'], function() 
	{
		Route::get('adm/', function () {
        	return view('adm/inicio');
    	});
    	Route::get('adm/inicio', function () {
        	return view('adm/inicio');
    	});

	 	Route::controller('adm/usuarios', 'usuariosController');
	 	Route::controller('adm/clientes', 'ClientesController');
        Route::controller('adm/produtos', 'produtosController');
        Route::controller('adm/categorias', 'categoriaController');
	}
);

Route::controller('/', 'lojaController');

Route::get('/ajax-subcategoria',function(Request $request)
{
    $subcategoria = subcategoria::where('categoria','=',$request->input('id_categoria'));
    return Response::json($subcategoria);
});