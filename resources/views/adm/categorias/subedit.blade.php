@extends('layout.adm')
@section('titulo', 'Editar Sub Categoria')
 



@section('caminho')
  <!--titulo conteudo-->
  <!--titulo conteudo-->
    <section class="content-header">
    @foreach($subcategorias as $subcategoria)
        <h1>Sub Categorias <small> Editar de Sub Categoria  <strong>{{$subcategoria->descricao}}</strong></small></h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
          <li><a href="{{asset('adm/categorias/subshow')}}/{{$subcategoria->id}}"><i class="glyphicon glyphicon-list-alt"></i> {{$subcategoria->descricao}}</a></li>
          <li><i class="glyphicon glyphicon-pencil"></i>Editar Sub Categoria {{$subcategoria->descricao}}</li>
        </ol>
      </section>
    @endforeach 
@stop


@section('conteudo')
 @foreach($subcategorias as $subcategoria)      
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">
                     <form action="{{asset('adm/categorias/subupdate')}}" method="post" >

                        <div class="row">
                            <div class="col-md-12">
                                <label for="descricao">Descrição:</label>
                                <input name="descricao" type="text" maxlength="100" required="" value="{{$subcategoria->descricao}}" placeholder="Descrição" class="form-control"></input>

                                <input name="categoria" type="text" value="{{$subcategoria->categoria}}" hidden  maxlength="100" required=""></input>
                                <input name="id" type="text" value="{{$subcategoria->id}}" hidden  maxlength="100" required=""></input>
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
 @endforeach
@stop

