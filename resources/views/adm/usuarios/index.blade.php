@extends('layout.adm')
@section('titulo', 'Usuários')


@section('caminho')
    <section class="content-header">
      <h1>Usuários<small> Listagem de usuários</small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/usuarios')}}"><i class="glyphicon glyphicon-user"></i> Usuários</a></li>
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
                  <form action="{{asset('/adm/usuarios')}}" method="POST">                   
                    <div class="col-md-12">   
                      <div class="input-group">   
                        <label for="filtro">Filtro:</label>  
                        <input type="text" title="Este filtro buscará por ID, RAZAO DO CLIENTE, NOME e EMAIL ordenará por id" name="filtro" maxlength="200" placeholder="Seu Filtro Aqui ..." value="@if(isset($_POST['filtro'])){{$_POST['filtro']}}@endif" class="form-control"></input> 
                        <div class="input-group-btn">
                           <button title="Pesquisar" class="btn btn-flat altura_label"><span class="glyphicon glyphicon-search" style="height: 20px;"></span></button>
                        </div>                    
                      </div>
                    </div>
                  </form>
                <!-- FILTRO --> 
              </div>

                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody>
                    <tr>
                      <th class="centro">Nome</th>
                      <th class="centro">Email</th>
                      <th class="centro">Tipo Usuário</th>                     
                      <th class="centro">Cliente</th>                     
                      @if(Auth::user()->administrador=='S')
                          <th class="centro">Administrador</th>
                          <th class="centro">Liberado</th>                          
                      @endif
                      <th class="centro"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>
                   @foreach ($usuarios as $usuario)
                       @if($usuario->email!='root')
                        <tr>
                          <td class="centro"> <a title="Ver" href="/adm/usuarios/show/{{$usuario->id}}"> {{$usuario->nome}}  </a></td>
                          <td class="centro"> <a title="Ver" href="/adm/usuarios/show/{{$usuario->id}}"> {{$usuario->email}} </a></td>

                          @if($usuario->tipo_usuario=='ADMIN')
                              <td title="Possui acesso a área administrativa" class="centro"> <span class="glyphicon glyphicon-sunglasses"></span> Usuário Gerenciador</td>
                          @elseif($usuario->tipo_usuario=='CLIENTE')
                              <td title="Possui acesso a área do cliente" class="centro"> <span class="glyphicon glyphicon-equalizer"></span> Usuário de Empresa</td>
                          @endif


                        <td class="centro"><a href="/adm/clientes/edit/{{$usuario->cliente}}">@if($usuario->cliente!=0){{$usuario->razao}}@endif</a></td>

                          @if(Auth::user()->administrador=='S')
                               @if($usuario->administrador=='S') 
                                <td class="centro">
                                    <a title="Clique dar privilégios de administrador a este usuário" href="/adm/usuarios/administrador/{{$usuario->id}}"><button class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button></a>
                                </td>
                              @else
                                <td class="centro">
                                    <a title="Clique remover privilégios de administrador deste usuário" href="/adm/usuarios/administrador/{{$usuario->id}}"><button class="btn btn-danger"><span class="glyphicon glyphicon-unchecked"></span></button></a>
                                </td>
                              @endif  

                              @if($usuario->liberado=='S') 
                                <td class="centro">
                                    <a title="Clique para bloquear este usuário" href="/adm/usuarios/bloquear/{{$usuario->id}}"><button class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button></a>
                                </td>
                              @else
                                <td class="centro">
                                    <a title="Clique para liberar este usuário" href="/adm/usuarios/bloquear/{{$usuario->id}}"><button class="btn btn-danger"><span class="glyphicon glyphicon-unchecked"></span></button></a>
                                </td>
                              @endif  
                              <td class="col-md-2">
                                  <div class="col-md-6">
                                      <a class="preto" title="Editar" href="/adm/usuarios/edit/{{$usuario->id}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                  </div>
                                  <div class="col-md-6">
                                      <a class="vermelho" title="Excluir" href="javascript:excluir({{$usuario->id}});"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                                  </div>                        
                              </td>                       
                          @endif                     
                        </tr>
                      @endif
                  @endforeach
                  </tbody>
                </table>
                {{ $usuarios->links() }}
              </div><!-- /.box-body -->
            </div><!-- /.box -->
  </div>
</div>
@if(Auth::user()->administrador=='S')
<form action="{{asset('/adm/usuarios/create')}}" method="POST">
  <input value="ADMIN" hidden="" name="tipo_usuario"></input>
  <input required="" hidden="" value="/adm/usuarios" name="retorno"></input>
  <input type="submit" class="btn btn-success" value="Novo Usuário"></input>
</form>
@endif
@stop

<script type="text/javascript">
   function excluir(id)
   {
      if(confirm('Deseja excluir este registro ?'))
      {
         window.location.href="/adm/usuarios/destroy/"+id;
      }
      else
        return false;
   }
</script>