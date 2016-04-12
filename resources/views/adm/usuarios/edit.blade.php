@extends('layout.adm')
@section('titulo', 'Editar Usuário')
 



@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Usuário<small> Alteração/visualização de usuário</small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/usuarios')}}"><i class="glyphicon glyphicon-user"></i> Usuários</a></li>
        <li><i class="glyphicon glyphicon-pencil"></i> Editar/Visualizar  Usuários</li>
      </ol>
    </section>
@stop


@section('conteudo')
    <!-- inserir -->
    

       <!-- caixa 1 -->
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">
                @if($operation=="edit") 
                        <form action="{{asset('/adm/usuarios/update')}}" onsubmit="return valida()" method="post" >
                         @foreach($usuarios as $usuario)
                            <input value="{{$usuario->id}}" name="id" hidden=""></input>
                            <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" /><!-- token obrigatorio do laravel, 
                        sempre copiar este input em seus formulários -->                       
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome</label>
                                    <input class="form-control" required="" placeholder="Nome" maxlength="100" type="text" name="nome" id="nome" value="{{$usuario->nome}}"></input>
                                </div> 
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" readonly=""  value="{{$usuario->email}}" required=""  placeholder="Email" maxlength="100" type="email" name="email" id="email"></input>
                                </div>        
                                                             
                            </div><!-- row -->
                                     
                        @endforeach
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" value="Salvar" style="margin-top: 25px"></input>
                                </div>                               
                            </div><!-- row -->
                        </form>  

                <!-- inserir -->  


                @elseif($operation=="show")
                <!-- visualizar -->

                        <form action="{{asset('/adm/usuarios/update')}}" onsubmit="return valida()" method="post" >
                         @foreach($usuarios as $usuario)
                            <input value="{{$usuario->id}}" name="id" hidden=""></input>
                            <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" /><!-- token obrigatorio do laravel, 
                        sempre copiar este input em seus formulários -->                       
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome</label>
                                    <input class="form-control"  readonly="" placeholder="Nome" maxlength="100" type="text" name="nome" id="nome" value="{{$usuario->nome}}"></input>
                                </div> 
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" readonly="" value="{{$usuario->email}}"   placeholder="Email" maxlength="100" type="email" name="email" id="email"></input>
                                </div>   
                                                     
                            </div><!-- row -->
                                     
                        @endforeach
                            <div class="row">
                                <div class="col-md-1">
                                    <a href="{{asset('/adm/usuarios')}}" class="btn btn-warning" style="margin-top: 25px"><span class="glyphicon glyphicon-arrow-left"></span>  Voltar</a>
                                </div>                                                           
                            </div><!-- row -->
                        </form>  

                <!-- visualizar -->
                @endif
               </div>
            </div>
        </div>
        <!-- caixa 1 -->
@stop


<script>
    function valida()
    {
        return true;
    }
</script>