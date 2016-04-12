@extends('layout.adm')
@section('titulo', 'Criar Cliente')
 



@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Cliente<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('adm/empresas')}}"><i class="glyphicon glyphicon-wrench"></i> Cliente</a></li>
                <li><i class="glyphicon glyphicon-plus"></i> Novo Cliente</li>
      </ol>
    </section>
@stop


@section('conteudo')
       
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">
                     <form action="{{asset('adm/clientes/store')}}" method="post" >
                     <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" />
                     <input hidden name="liberado" value="S"/>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="razao">Razão:</label>
                                <input class="form-control" maxlength="200" required="" type="text" name="razao">
                            </div>
                            <div class="col-md-6">
                                <label for="nome">Nome:</label>
                                <input class="form-control" maxlength="250" required="" type="text" name="nome">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">          
                                <label for="cnpj">CNPJ/CPF:</label>
                                <input class="form-control" maxlength="100" required="" type="text" name="cnpjcpf">    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <input type="submit" class="btn btn-success" value="Salvar" style="margin-top: 25px"></input>
                            </div>
                    </form> 
                
               </div>
            </div>
        </div>
@stop

