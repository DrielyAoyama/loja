@extends('layout.adm')
@section('titulo', 'produtos')


@section('caminho')
    <section class="content-header">
      <h1>Produtos<small> Listagem de produtos</small></h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('/adm')}}"><i class="glyphicon glyphicon-briefcase"></i> Início</a></li>
        <li><a href="{{asset('/adm/produtos')}}"><i class="glyphicon glyphicon-gift"></i> produtos</a></li>
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
                  <form action="{{asset('/adm/produtos')}}" method="POST">                   
                    <div class="col-md-12">   
                      <div class="input-group">   
                        <label for="filtro">Filtro:</label>  
                        <input type="text" title="Este filtro buscará por ID e NOME e ordenará por id" name="filtro" maxlength="200" placeholder="Seu Filtro Aqui ..." value="@if(isset($_POST['filtro'])){{$_POST['filtro']}}@endif" class="form-control"></input> 
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
                      <th class="centro">id</th>
                      <th class="centro">Capa</th>
                      <th class="centro">Nome</th>
                      <th class="centro">Qtde</th>                     
                      <th class="centro">Preço</th>                     
                      <th class="centro">Custo</th>                       
                      <th class="centro">Lucro / Venda</th>                               
                      @if(Auth::user()->administrador=='S')
                          <th class="centro">Liberado</th>                          
                      @endif
                      <th class="centro"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>
                   @foreach ($produtos as $produto)
                        @if($produto->qtde>5) 
                          <tr style="background-color: #c4fce2">
                        @elseif($produto->qtde<=0)
                          <tr style="background-color: #ffbaba">
                        @elseif($produto->qtde<=5)
                          <tr style="background-color: #fffcba">
                        @endif
                          <td class="centro"> {{$produto->id}}    </td>
                          <td class="centro">     <img class="img_table" src="{{asset('layout/imagens/icone_img.png')}}">   </td>
                          <td class="centro"><a title="Ver" href="/adm/produtos/show/{{$produto->id}}"> {{$produto->nome}}</a>    </td>
                          <td class="centro"> {{$produto->qtde}}    </td>
                          <td class="centro"> R$ {{ number_format($produto->preco, 2, ',', ' ')}}     </td>
                          <td class="centro"> R$ {{ number_format($produto->custo, 2, ',', ' ')}}     </td>
                          <td class="centro"> R$ {{ number_format($produto->preco-$produto->custo, 2, ',', ' ')}} ( {{round((($produto->preco-$produto->custo)*100)/$produto->preco,2)}} %)</td>
                        
                          @if(Auth::user()->administrador=='S')
                               
                              @if($produto->liberado=='S') 
                                <td class="centro">
                                    <a title="Clique para bloquear a venda" href="/adm/produtos/bloquear/{{$produto->id}}"><button class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button></a>
                                </td>
                              @else
                                <td class="centro">
                                    <a title="Clique para liberar a venda" href="/adm/produtos/bloquear/{{$produto->id}}"><button class="btn btn-danger"><span class="glyphicon glyphicon-unchecked"></span></button></a>
                                </td>
                              @endif  
                              <td class="col-md-2">   
                                  <div class="col-md-4">
                                      <a class="preto" title="Fotos" href=""><button class="btn btn-primary"><span class="glyphicon glyphicon-picture"></span></button></a>
                                  </div>
                                  <div class="col-md-4">
                                      <a class="preto" title="Editar" href="/adm/produtos/edit/{{$produto->id}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                  </div>
                                  <div class="col-md-4">
                                      <a class="vermelho" title="Excluir" href="javascript:excluir({{$produto->id}});"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                                  </div>                        
                              </td>
                          @endif                     
                        </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $produtos->links() }}
              </div><!-- /.box-body -->
            </div><!-- /.box -->
  </div>
</div>
@if(Auth::user()->administrador=='S')
<a  href="{{asset('/adm/produtos/create')}}"><button class="btn btn-success">Novo produto</button></a>
@endif
@stop

<script type="text/javascript">
   function excluir(id)
   {
      if(confirm('Deseja excluir este registro ?'))
      {
         window.location.href="/adm/produtos/destroy/"+id;
      }
      else
        return false;
   }
</script>