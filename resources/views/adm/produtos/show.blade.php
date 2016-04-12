@extends('layout.adm')
@section('titulo', 'Visualizar Produto')
 




@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1> Visualizar Produto<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/produtos')}}"><i class="glyphicon glyphicon-gift"></i> Produtos</a></li>        
        <li><i class="glyphicon glyphicon-pencil"></i> Visualizar Produto</li>
      </ol>
    </section>
@stop


@section('conteudo')
    <!-- inserir -->
   @foreach($produtos as $produto)      
       <!-- caixa 1 -->
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">        

                            <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" /><!-- token obrigatorio do laravel, 
                        sempre copiar este input em seus formulários -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nome</label>
                                    <input class="form-control" readonly="" required=""  value="{{$produto->nome}}" placeholder="Nome" maxlength="200" type="text" name="nome" id="nome"></input>
                                </div>                                                          
                            </div><!-- row -->
                             <div class="row">  
                                <div class="col-md-2">
                                    <label>qtde</label>
                                    <input class="form-control" readonly="" required=""  value="{{$produto->qtde}}" required="" value="0"  type="number" step="0.01" name="qtde" id="qtde"></input>
                                </div>                                       
                                <div class="col-md-3">
                                    <label>Preço</label>
                                    <input class="form-control" readonly="" required="" value="{{$produto->preco}}" value="0"  placeholder="R$" type="number" step="0.01" name="preco" id="preco"></input>
                                </div>  
                                <div class="col-md-3">
                                    <label>Custo</label>
                                    <input class="form-control" readonly="" required=""  value="{{$produto->custo}}" value="0" placeholder="R$" type="number" step="0.01" name="custo" id="custo"></input>
                                </div>                                    
                                <div class="col-md-2">
                                    <label>Liberado</label>
                                    @if($produto->liberado=='S')
                                        <input readonly="" class="form-control" type="text" value="SIM"></input>
                                    @else   
                                        <input readonly="" class="form-control" type="text" value="NÃO"></input>
                                    @endif                                
                                    </select>
                                </div>     
                                                 
                            </div><!-- row -->                           

                            <div class="row">
                                <div class="col-md-1">
                                    <a href="{{asset('/adm/produtos')}}"><button type="submit" class="btn btn-warning" style="margin-top: 25px"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</button></a>
                                </div>                          
                            </div><!-- row -->
                         

               </div>
            </div>
        </div>
    @endforeach
        <!-- caixa 1 -->
@stop





