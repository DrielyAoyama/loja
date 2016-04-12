@extends('layout.adm')
@section('titulo', 'Criar produto')
 



@section('caminho')
  <!--titulo conteudo-->
    <section class="content-header">
      <h1>Criar Usuário<small> Cadastro de Produto</small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/produtos')}}"><i class="glyphicon glyphicon-gift"></i> Produtos</a></li>
        <li><i class="glyphicon glyphicon-plus"></i> Novo Produto</li>
      </ol>
    </section>
@stop


@section('conteudo')
    <!-- inserir -->
         
       <!-- caixa 1 -->
        <div class="col-md-12">
            <div class="box box-primary sombra_estatico">
                <div class="box-header">

                        <form action="{{asset('/adm/produtos/store')}}"  method="post" >       
                            <input required="" hidden="" value="0"  type="number" step="0.01" name="qtde_vendida" id="qtde_vendida"></input>              

                            <input hidden name="_token" id="csrf-token" value="{{ Session::token() }}" /><!-- token obrigatorio do laravel, 
                        sempre copiar este input em seus formulários -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nome</label>
                                    <input class="form-control" required="" placeholder="Nome" maxlength="200" type="text" name="nome" id="nome"></input>
                                </div>                                                          
                            </div><!-- row -->
                            <div class="row">  
                                <div class="col-md-3">
                                    <label>qtde</label>
                                    <input class="form-control" required="" required="" value="0"  type="number" step="0.01" name="qtde" id="qtde"></input>
                                </div>                                       
                                <div class="col-md-3">
                                    <label>Preço</label>
                                    <input class="form-control" required="" value="0"  placeholder="R$" type="number" step="0.01" name="preco" id="preco"></input>
                                </div>  
                                <div class="col-md-3">
                                    <label>Custo</label>
                                    <input class="form-control" required="" value="0" placeholder="R$" type="number" step="0.01" name="custo" id="custo"></input>
                                </div>                                    
                                <div class="col-md-3">
                                    <label>Liberado</label>
                                    <select class="form-control"  name="liberado">
                                        <option value="S" selected="">SIM</option>      
                                        <option value="N">NÃO</option>                                     
                                    </select>
                                </div> 
                            </div> 
                            <hr>
                             <!-- CAPA -->
                            <hr>
                            <div class="row"> 
                                <div class="col-md-4">
                                    <label>Categoria</label>
                                    <select class="form-control" id="categoria" name="categoria" onchange="liberasub()">
                                        <option value="0" selected="">Sem Categoria</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4"  id="subcategorias" style="display: none" onchange="liberasubsub()">
                                    <label>Sub Categoria</label>
                                    <select class="form-control" name="categoria">
                                        <option value="0" selected="">Sem Sub Categoria</option>  
                                        <option value="1" selected="">Sub Categoria</option>                                       
                                    </select>
                                </div>

                                <div class="col-md-4" id="subsubcategorias" style="display: none">
                                    <label>Sub Sub Categoria</label>
                                    <select class="form-control" name="categoria">  
                                        <option value="0" selected="">Sem Sub Sub Categoria</option>                                       
                                    </select>
                                </div>
                            </div>  



                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="submit" class="btn btn-success" value="Salvar" style="margin-top: 25px"></input>
                                    </div>
                                </form>                             
                            </div><!-- row -->              
                            </div><!-- row -->                           

                          
                         

               </div>
            </div>
        </div>
        <!-- caixa 1 -->
@stop


<script>
   function liberasub()
   {
        if(document.getElementById("categoria").value!=0)
            document.getElementById("subcategorias").style.display = "block";
        else
        {
            document.getElementById("subcategorias").style.display = "none";
            document.getElementById("subsubcategorias").style.display = "none";
        }
   }
   function liberasubsub()
   {
        if(document.getElementById("subcategorias").value!=0)
            document.getElementById("subsubcategorias").style.display = "block";
        else
            document.getElementById("subsubcategorias").style.display = "none";
   }

    // var option = document.createElement("option");
    // option.text = "Kiwi";
    // x.add(option);
</script>


