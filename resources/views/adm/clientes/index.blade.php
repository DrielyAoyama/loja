@extends('layout.adm')
@section('titulo', 'clientes')
 


@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Clientes <small> Listagem de Clientes</small></h1>
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
                  <form action="{{asset('/adm/clientes')}}" method="POST">                   
                    <div class="col-md-12">   
                      <div class="input-group">   
                        <label for="filtro">Filtro:</label>  
                        <input type="text" title="Este filtro buscará por ID, RAZÃO , NOME e CNPJ/CPF ordenará por id" name="filtro" maxlength="200" placeholder="Seu Filtro Aqui ..." value="@if(isset($_POST['filtro'])){{$_POST['filtro']}}@endif" class="form-control"></input> 
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
                      <th style="width: 10px">id</th>
                      <th>Razao</th>
                      <th>CNPJ / CPF</th>
                       @if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
                          <th class="centro">Liberado</th>                          
                      @endif
                      <th class="centro"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>

                   @foreach ($clientes as $cliente)
                       @if($cliente->id!=0)
                        <tr>
                          <td> {{$cliente->id}}     </td>
                          <td><a title="Ver" href="/adm/clientes/show/{{$cliente->id}}"> {{$cliente->razao}} </a> </td>
                          <td><a title="Ver" href="/adm/clientes/show/{{$cliente->id}}"> {{$cliente->cnpjcpf}} </a>  </td>  
                          @if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
                            @if($cliente->liberado=='S') 
                                <td class="centro">
                                    <a title="Clique para bloquear este usuário" href="/adm/clientes/bloquear/{{$cliente->id}}"><button class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button></a>
                                </td>
                              @else
                                <td class="centro">
                                    <a title="Clique para liberar este usuário" href="/adm/clientes/bloquear/{{$cliente->id}}"><button class="btn btn-danger"><span class="glyphicon glyphicon-unchecked"></span></button></a>
                                </td>
                              @endif  
                              <td class="col-md-2"> 
                                    <div class="col-md-6">
                                        <a title="Editar" href="/adm/clientes/edit/{{$cliente->id}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                    </div>
                                    <div  class="col-md-6">
                                        <a class="vermelho" title="Excluir" href="javascript:excluir({{$cliente->id}})"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                                    </div>                        
                                </td>    
                          @elseif((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='N'))
                              <td class="col-md-2">
                                    <div class="centro">
                                        <a title="Ver" href="/adm/clientes/show/{{$cliente->id}}"><button class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button></a>
                                    </div>
                              </td> 
                          @endif                 
                        </tr>
                      @endif
                  @endforeach
                  </tbody>
                </table>
                {{ $clientes->links() }}
              </div><!-- /.box-body -->
            </div><!-- /.box -->
  </div>
</div>
@if((Auth::user()->tipo_usuario=='ADMIN')&&(Auth::user()->administrador=='S'))
   <a  href="{{asset('adm/clientes/create')}}"><button class="btn btn-success">Nova cliente</button></a> 
@endif
@stop




<script type="text/javascript">
   function excluir(id)
   {
      if(confirm('Deseja excluir este registro ?'))
      {
         window.location.href="/adm/clientes/destroy/"+id;
      }
      else
        return false;
   }
</script>