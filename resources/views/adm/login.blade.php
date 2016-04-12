@extends('layout.login')
@section('titulo', 'Login')
 


<!-- 
@section('caminho')

@stop -->



@section('conteudo')	          
    <div class="container" style="text-align: ">   

        <div class="col-md-6 col-centered">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">

                	



                	<form class="form-signin"  method="post" action="{{asset('auth/autenticar')}}">
				        <h2 class="form-signin-heading centro"><img style="width: 150px" src="{{asset('layout/imagens/logo_lite.png')}}"></h2>
				        <label for="email" class="sr-only">Usuário</label>
				        <input type="text" name="email" class="form-control" placeholder="Email" maxlength="250" minlength="4" required="" autofocus="">
				        <label for="senha" class="sr-only">Password</label>
				        <input type="password" name="senha" class="form-control" maxlength="20" minlength="4" placeholder="Senha" required="">
				        <div class="checkbox">
				          <label>
				            <input type="checkbox" name="permanecer_logado" checked=""> Manter-se Conectado
				          </label>
				        </div>				        
				        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
				        
				        <div class="checkbox" style="margin-top: 8px;">
				        	<a> Esqueci a senha</a>
				        </div>
				    </form>


               </div>
            </div>
        </div>
    </div>

@stop