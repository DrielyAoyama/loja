@extends('layout.adm')
@section('titulo', 'Editar Produto')
 




@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Editar Produto<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/produtos')}}"><i class="glyphicon glyphicon-gift"></i> Produtos</a></li>        
        <li><i class="glyphicon glyphicon-pencil"></i> Editar Produto</li>
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

                        <form action="{{asset('/adm/produtos/update')}}"  method="post" >       
                            <input required="" hidden=""  type="number" value="{{$produto->id}}" name="id" id="id"></input>              

                            <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" /><!-- token obrigatorio do laravel, 
                        sempre copiar este input em seus formulários -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nome</label>
                                    <input class="form-control" required=""  value="{{$produto->nome}}" placeholder="Nome" maxlength="200" type="text" name="nome" id="nome"></input>
                                </div>                                                          
                            </div><!-- row -->
                             <div class="row">  
                                <div class="col-md-2">
                                    <label>qtde</label>
                                    <input class="form-control" required=""  value="{{$produto->qtde}}" required="" value="0"  type="number" step="0.01" name="qtde" id="qtde"></input>
                                </div>                                       
                                <div class="col-md-3">
                                    <label>Preço</label>
                                    <input class="form-control" required="" value="{{$produto->preco}}" value="0"  placeholder="R$" type="number" step="0.01" name="preco" id="preco"></input>
                                </div>  
                                <div class="col-md-3">
                                    <label>Custo</label>
                                    <input class="form-control" required=""  value="{{$produto->custo}}" value="0" placeholder="R$" type="number" step="0.01" name="custo" id="custo"></input>
                                </div>                                    
                                <div class="col-md-2">
                                    <label>Liberado</label>
                                    <select class="form-control"  name="liberado">
                                    @if($produto->liberado=='S')
                                        <option value="S" selected="">SIM</option>      
                                        <option value="N">NÃO</option>   
                                    @else   
                                        <option value="S" >SIM</option>      
                                        <option value="N" selected="">NÃO</option>  
                                    @endif                                
                                    </select>
                                </div>     
                                                 
                            </div><!-- row -->                           

                            <div class="row">
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" value="Salvar" style="margin-top: 25px"></input>
                                </div>
                                </form>                             
                            </div><!-- row -->
                         

               </div>
            </div>
        </div>
    @endforeach
        <!-- caixa 1 -->
@stop





