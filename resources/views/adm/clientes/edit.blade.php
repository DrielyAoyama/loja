@extends('layout.adm')
@section('titulo', 'Editar Cliente')
 



@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>cliente<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/clientes')}}"><i class="glyphicon glyphicon-equalizer"></i> clientes</a></li>        
        <li><i class="glyphicon glyphicon-pencil"></i> Editar/Visualizar cliente</li>
      </ol>
    </section>
@stop


@section('conteudo')
       
   @if($operation=="edit") 
   @foreach($clientes as $cliente)
          <div class="col-md-12">
              <div class="box box-primary sombra_estatico">
                  <div class="box-header">
                    <form action="{{asset('/adm/clientes/update')}}" onsubmit="return valida()" method="post" >   
                       <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" />
                       <input value="{{$cliente->id}}" name="id" hidden=""></input>
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="razao">Razão:</label>
                                  <input class="form-control" maxlength="200" required="" value="{{$cliente->razao}}" type="text" name="razao">
                              </div>
                              <div class="col-md-6">
                                  <label for="nome">Nome:</label>
                                  <input class="form-control" maxlength="250" required="" value="{{$cliente->nome}}" type="text" name="nome">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-4">          
                                  <label for="cnpj">CNPJ/CPF:</label>
                                  <input class="form-control" maxlength="100" required="" value="{{$cliente->cnpjcpf}}" type="text" name="cnpjcpf">    
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-1">
                                <input type="submit" class="btn btn-success altura_label" value="Salvar"></input>
                            </div>

                        
                    </form>                 
              </div>

      <hr>
      
      @if(count($usuarios)==0)
              <form action="{{asset('/adm/usuarios/create')}}" method="POST" style="margin-top: 20px;">  
                  <input hidden="" name="retorno" value="/adm/clientes/edit/{{$cliente->id}}"></input>
                  <input hidden="" name="tipo_usuario" value="CLIENTE"></input>
                  <input hidden="" name="id_cliente" value="{{$cliente->id}}"></input>
                  <input hidden="" name="razao_cliente" value="{{$cliente->razao}}"></input>
                  <button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Cadastrar Usuário para este cliente</button>
              </form>
      @else
        <h2>Usuário</h2>
      @endif
       @foreach($usuarios as $usuario)
          @if($usuario->liberado=='S')
           <div class="col-md-12" title="Usuário Liberado">
              <div class="box box-primary sombra_estatico">
          @elseif($usuario->liberado=='N')
          <div class="col-md-12" title="Usuário Bloqueado">
              <div class="box box-danger sombra_estatico">
          @endif
                  <div class="box-header">
                      <div class="row">
                          <div class="col-md-12">
                            <label>Email</label>
                            <input class="form-control" readonly="" value="{{$usuario->email}}"></input>
                          </div>
                           <div class="col-md-12">
                            <label>Nome</label>
                            <input class="form-control" readonly="" value="{{$usuario->nome}}"></input>
                          </div>
                          <div class="col-md-2">
                              @if($usuario->administrador=='S')
                                  <span class="glyphicon glyphicon-ok btn-success altura_label"></span> Administrador
                              @elseif($usuario->administrador=='N')
                                  <span class="glyphicon glyphicon-remove btn-danger altura_label"></span> Administrador
                              @endif
                          </div>
                          <div class="col-md-3">
                          <form action="{{asset('/adm/usuarios')}}" method="POST">
                            <input hidden value="{{$usuario->email}}" name="filtro"></input>
                            <button class="btn btn-info altura_label"><span class="glyphicon glyphicon-search"></span></button>
                          </form>
                      </div>   
                      </div> 
                                 
                 </div>                                     
              </div>

          </div>
          @endforeach
    </div>


    @endforeach
    @elseif($operation=="show")
        @foreach($clientes as $cliente)
          <div class="col-md-12">
              <div class="box box-primary sombra_estatico">
                  <div class="box-header">
                       
                       <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" />
                       <input hidden name="liberado" value="S"/>

                          <div class="row">
                              <div class="col-md-6">
                                  <label for="razao">Razão:</label>
                                  <input class="form-control" maxlength="200" readonly="" value="{{$cliente->razao}}" type="text" name="razao">
                              </div>
                              <div class="col-md-6">
                                  <label for="nome">Nome:</label>
                                  <input class="form-control" maxlength="250" readonly="" value="{{$cliente->nome}}" type="text" name="nome">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-4">          
                                  <label for="cnpj">CNPJ/CPF:</label>
                                  <input class="form-control" maxlength="100" readonly="" value="{{$cliente->cnpjcpf}}" type="text" name="cnpjcpf">    
                              </div>
                          </div>
                          <div class="row">
                  
                 </div>
                 <div class="row">
                    <div class="col-md-1">
                      <a href="{{asset('/adm/clientes')}}" class="btn btn-warning" style="margin-top: 25px"><span class="glyphicon glyphicon-arrow-left"></span>  Voltar</a>
                    </div>                                                           
                 </div><!-- row -->

                 <hr>

                  @foreach($usuarios as $usuario)
                @if($usuario->liberado=='S')
                 <div class="col-md-12" title="Usuário Liberado">
                    <div class="box box-primary sombra_estatico">
                @elseif($usuario->liberado=='N')
                <div class="col-md-12" title="Usuário Bloqueado">
                    <div class="box box-danger sombra_estatico">
                @endif
                        <div class="box-header">
                            <div class="row">
                                <div class="col-md-12">
                                  <label>Email</label>
                                  <input class="form-control" readonly="" value="{{$usuario->email}}"></input>
                                </div>
                                 <div class="col-md-12">
                                  <label>Nome</label>
                                  <input class="form-control" readonly="" value="{{$usuario->nome}}"></input>
                                </div>
                                <div class="col-md-2">
                                    @if($usuario->administrador=='S')
                                        <span class="glyphicon glyphicon-ok btn-success altura_label"></span> Administrador
                                    @elseif($usuario->administrador=='N')
                                        <span class="glyphicon glyphicon-remove btn-danger altura_label"></span> Administrador
                                    @endif
                                </div>
                                <div class="col-md-3">
                                <form action="{{asset('/adm/usuarios')}}" method="POST">
                                  <input hidden value="{{$usuario->email}}" name="filtro"></input>
                                  <button class="btn btn-info altura_label"><span class="glyphicon glyphicon-search"></span></button>
                                </form>
                            </div>   
                            </div> 
                                       
                       </div>                                     
                    </div>

                </div>
                @endforeach

              </div>               

          </div>



        @endforeach       
     
    @endif

@stop
