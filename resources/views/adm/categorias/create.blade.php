@extends('layout.adm')
@section('titulo', 'Criar Categoria')
 



@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Categoria<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('adm/categorias')}}"><i class="glyphicon glyphicon-list-alt"></i> Categorias</a></li>
        <li><i class="glyphicon glyphicon-plus"></i> Nova Categoria</li>
      </ol>
    </section>
@stop


@section('conteudo')
       
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">
                     <form action="{{asset('adm/categorias/store')}}" method="post" >

                        <div class="row">
                            <div class="col-md-12">
                                <label for="descricao">Descrição:</label>
                                <input name="descricao" type="text" maxlength="100" required="" placeholder="Descrição" class="form-control"></input>
                            </div>                            
                        </div>                      
                        <div class="row">
                            <div class="col-md-1">
                                <input type="submit" class="btn btn-success" value="Salvar" style="margin-top: 25px"></input>
                            </div>
                        </div>
                    </form> 
                
               </div>
            </div>
        </div>
@stop

