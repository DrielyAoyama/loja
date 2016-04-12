@extends('layout.adm')
@section('titulo', 'Editar Sub Sub Categoria')
 



@section('caminho')
  <!--titulo conteudo-->
  <!--titulo conteudo-->
    <section class="content-header">
        <h1>Sub Sub Categorias <small> Editar de Sub Sub Categoria  <strong></strong></small></h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
          <li><a href="{{asset('adm/categorias/subsubcategoria')}}/{{$idsubcategoria}}"><i class="glyphicon glyphicon-list-alt"></i>Sub Sub categorias</a></li>
          <li><i class="glyphicon glyphicon-pencil"></i>Editar Sub Sub Categoria </li>
        </ol>
      </section>
@stop


@section('conteudo')
 @foreach($subsubcategorias as $subsubcategoria)      
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">
                     <form action="{{asset('adm/categorias/subsubupdate')}}" method="post" >

                        <div class="row">
                            <div class="col-md-12">
                                <label for="descricao">Descrição:</label>
                                <input name="descricao" type="text" maxlength="100" required="" value="{{$subsubcategoria->descricao}}" placeholder="Descrição" class="form-control"></input>

                                <input name="subcategoria" type="text" value="{{$subsubcategoria->subcategoria}}" hidden=""  maxlength="100" required=""></input>
                                <input name="id" type="text" value="{{$subsubcategoria->id}}"  hidden=""  required=""></input>
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

