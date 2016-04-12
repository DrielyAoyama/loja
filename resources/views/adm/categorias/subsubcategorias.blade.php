@extends('layout.adm')
@section('titulo', 'Sub categorias')
 


@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
  
        <h1>Sub Sub Categorias <small> Listagem de Sub Sub Categorias de <strong>{{$descricaosubcategoria}}</strong></small></h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
          <li><a href="{{asset('adm/categorias/subcategoria')}}/{{$idcategoria}}}"><i class="glyphicon glyphicon-list-alt"></i> {{$descricaocategoria}}</a></li>
          <li><i class="glyphicon glyphicon-indent-left"></i> Sub Sub Categoria de <strong>{{$descricaosubcategoria}}</strong> </li>
        </ol>
      </section>
@stop   
    <!--/titulo conteudo-->
@section('conteudo')
<div class="row">
  <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">

                <!-- FILTRO -->
                  <form action="{{asset('/adm/categorias')}}" method="POST">                   
                    <div class="col-md-12">   
                      <div class="input-group">   
                        <label for="filtro">Filtro:</label>  
                        <input type="text" title="Este filtro buscará por ID e DESCRIÇÃO , NOME ordenará por id" name="filtro" maxlength="200" placeholder="Seu Filtro Aqui ..." value="@if(isset($_POST['filtro'])){{$_POST['filtro']}}@endif" class="form-control"></input> 
                        <div class="input-group-btn">
                           <button title="Pesquisar" class="btn btn-flat altura_label"><span class="glyphicon glyphicon-search" style="height: 20px;"></span></button>
                        </div>                    
                      </div>
                    </div>
                  </form>
                <!-- FILTRO -->

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody>
                    <tr>
                      <th>Descrição</th>
                      <th class="centro"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>

                   @foreach ($subsubcategorias as $subsubcategoria)
                        <tr>
                          <td><a title="Ver" href="/adm/categorias/show/{{$subsubcategoria->id}}"> {{$subsubcategoria->descricao}} </a> </td>
                          @if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))                         
                              <td class="col-md-2"> 
                                    <div class="col-md-6">
                                        <a title="Editar" href="/adm/categorias/subsubedit/{{$subsubcategoria->id}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                    </div>
                                    <div  class="col-md-6">
                                        <a class="vermelho" title="Excluir" href="javascript:excluir({{$subsubcategoria->id}})"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                                    </div>                        
                                </td>                         
                          @endif                 
                        </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $subsubcategorias->links() }}
              </div><!-- /.box-body -->
            </div><!-- /.box -->
  </div>
</div>
@if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
   <a href="{{asset('adm/categorias/subsubcreate')}}/{{$idsubcategoria}}"><button class="btn btn-success">Nova Sub Sub categoria de {{$descricaosubcategoria}} </button></a> 
@endif
@stop




<script type="text/javascript">
   function excluir(id)
   {
      if(confirm('Deseja excluir este registro ?'))
      {
         window.location.href="/adm/categorias/subsubdestroy/"+id;
      }
      else
        return false;
   }
</script>