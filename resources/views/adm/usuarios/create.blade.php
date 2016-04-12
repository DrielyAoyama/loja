@extends('layout.adm')
@section('titulo', 'Criar Usuário')
 



@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Usuário<small> Cadastro de usuário</small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/usuarios')}}"><i class="glyphicon glyphicon-user"></i> Usuários</a></li>
        <li><i class="glyphicon glyphicon-plus"></i> Novo Usuários</li>
      </ol>
    </section>
@stop


@section('conteudo')
    <!-- inserir -->
         
       <!-- caixa 1 -->
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">

                        <form action="{{asset('/adm/usuarios/store')}}" onsubmit="return valida()" method="post" >
                        @if(isset($_POST['retorno']))
                            <input hidden="" value="{{$_POST['retorno']}}" name="retorno"></input>
                        @endif

                            <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" /><!-- token obrigatorio do laravel, 
                        sempre copiar este input em seus formulários -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome</label>
                                    <input class="form-control" required=""  placeholder="Nome" maxlength="100" type="text" name="nome" id="nome"></input>
                                </div>      
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" required=""  placeholder="Email" maxlength="100" type="email" name="email" id="email"></input>
                                </div>                             
                            </div><!-- row -->
                             <div class="row">                                      
                                <div class="col-md-4">
                                    <label>Senha</label>
                                    <input class="form-control" required=""  placeholder="Senha" maxlength="20" minlength="4" type="password" name="senha" id="senha"></input>
                                </div>  
                                <div class="col-md-4">
                                    <label>Repita a senha</label>
                                    <input class="form-control" required=""   placeholder="Repita a senha" maxlength="20" minlength="4" type="password" name="repita" id="repita"></input>
                                </div>     
                                 <div class="col-md-2" style="display: none">
                                    <label>Tipo de Usuário</label>
                                    <input type="text"  class="form-control" value="{{$_POST['tipo_usuario']}}" name="tipo_usuario" ></input>  
                                </div>           
                                <div class="col-md-2">
                                    <label>Liberado</label>
                                    <select class="form-control"  name="liberado">
                                        <option value="S" selected="">SIM</option>      
                                        <option value="N">NÃO</option>                                     
                                    </select>
                                </div>     
                                <div class="col-md-2">
                                    <label>Administrador</label>
                                    <select class="form-control"  name="administrador">
                                        <option value="S">SIM</option>      
                                        <option value="N" selected="">NÃO</option>                                     
                                    </select>
                                </div>                           
                            </div><!-- row -->

                            @if((isset($_POST['id_cliente']))&&(isset($_POST['razao_cliente'])))
                            <div class="row">
                                <div class="col-md-12">   
                                    <label for="filtro">Cliente</label>  
                                    <input required="" hidden="" name="cliente" value="{{$_POST['id_cliente']}}"></input>
                                    <input type="text" readonly="" value="{{$_POST['razao_cliente']}}" class="form-control"></input>
                                </div>
                            </div> <!-- ROW -->
                            @else
                                <input required="" hidden="" value="0" name="cliente"></input>
                            @endif

                            <div class="row">
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" value="Salvar" style="margin-top: 25px"></input>
                                </div>
                                </form>                             
                            </div><!-- row -->
                         

               </div>
            </div>
        </div>
        <!-- caixa 1 -->
@stop


<script>
    function valida()
    {

        senha  = document.getElementById('senha').value;
        repita = document.getElementById('repita').value;
        if (repita==senha)
        {
            return true;
        }
        else
        {
            document.getElementById("senha").style.borderColor = "red";
            document.getElementById("repita").style.borderColor = "red";
            alert('Senhas não conferem')
            return false;  
        }        
    }

   
</script>



