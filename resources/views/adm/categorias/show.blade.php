@extends('layout.adm')
@section('titulo', 'Visualizar Categoria')
 



@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Categoria<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('adm/categorias')}}"><i class="glyphicon glyphicon-list-alt"></i> Categorias</a></li>
                <li><i class="glyphicon glyphicon-pencil"></i> Visualizar Categoria</li>
      </ol>
    </section>
@stop


@section('conteudo')
      @foreach($categorias as $categoria) 
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="descricao">Descrição:</label>
                                <input name="descricao" type="text" maxlength="100" required="" value="{{$categoria->descricao}}" readonly="" placeholder="Descrição" class="form-control"></input>
                                <input name="id" hidden="" required="" value="{{$categoria->id}}" ></input>
                            </div>                            
                        </div>                      
                        <div class="row">
                            <div class="col-md-1">
                               <a href="{{asset('adm/categorias')}}"> <button class="btn btn-warning" style="margin-top: 25px"><span class="glyphicon glyphicon-arrow-left"> </span> Voltar</button></a>
                            </div>
                        </div>
                
               </div>
            </div>
        </div>
      @endforeach
@stop

