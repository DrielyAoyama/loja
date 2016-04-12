@extends('layout.adm')
@section('titulo', 'Criar Sub Sub Categoria')
 



@section('caminho')
  <!--titulo conteudo-->
  <!--titulo conteudo-->
    <section class="content-header">
        <h1>Sub Categorias <small> Criar de Sub Sub Categoria de  <strong>{{$descricaosubcategoria}}</strong></small></h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
            <li><a href="{{asset('adm/categorias/subcategoria')}}/{{$idcategoria}}"><i class="glyphicon glyphicon-list-alt"></i> {{$descricaocategoria}}</a></li>
          <li><a href="{{asset('adm/categorias/subsubcategoria')}}/{{$idsubcategoria}}"><i class="glyphicon glyphicon-list-alt"></i> {{$descricaosubcategoria}}</a></li>
          <li><i class="glyphicon glyphicon-plus"></i>Criar Sub Sub Categoria de {{$descricaosubcategoria}}</li>
        </ol>
      </section>
@stop


@section('conteudo')
       
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">
                     <form action="{{asset('adm/categorias/subssubstore')}}" method="post" >

                        <div class="row">
                            <div class="col-md-12">
                                <label for="descricao">Descrição:</label>
                                <input name="descricao" type="text" maxlength="100" required="" placeholder="Descrição" class="form-control"></input>

                                <input name="subcategoria" type="text" value="{{$idsubcategoria}}" hidden maxlength="100" required=""></input>
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

