@extends('layout.adm')
@section('titulo', 'categorias')
 


@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Categorias <small> Listagem de Categorias</small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
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

                   @foreach ($categorias as $categoria)
                        <tr>
                          <td><a title="Ver" href="/adm/categorias/show/{{$categoria->id}}"> {{$categoria->descricao}} </a> </td>
                          @if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))                         
                              <td class="col-md-2"> 
                                   <div class="col-md-4">
                                        <a title="Sub Categorias" href="/adm/categorias/subcategoria/{{$categoria->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-indent-left"></span></button></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a title="Editar" href="/adm/categorias/edit/{{$categoria->id}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                    </div>
                                    <div  class="col-md-4">
                                        <a class="vermelho" title="Excluir" href="javascript:excluir({{$categoria->id}})"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                                    </div>                        
                                </td>                         
                          @endif                 
                        </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $categorias->links() }}
              </div><!-- /.box-body -->
            </div><!-- /.box -->
  </div>
</div>
@if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
   <a  href="{{asset('adm/categorias/create')}}"><button class="btn btn-success">Nova categoria</button></a> 
@endif
@stop




<script type="text/javascript">
   function excluir(id)
   {
      if(confirm('Deseja excluir este registro ?'))
      {
         window.location.href="/adm/categorias/destroy/"+id;
      }
      else
        return false;
   }
</script>