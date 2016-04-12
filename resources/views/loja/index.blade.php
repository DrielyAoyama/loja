@extends('layout.lojaindex')

@section('titulo', 'COFFEE PORTO')


@section('produtos_index')
	@foreach($destaques as $destaque)
	    <div class="col-xs-6 col-sm-3">
	  	    <div class="prod-tam">
				<a href="#">
	          		<div class="foto-prod">
	          		    <img src="{{asset('layout/templateloja/recorte/cafe.jpg')}}" width="100%">
	          		</div>	
		 			<div class="nome-prod">{{$destaque->nome}}</div>
					<div><span class="por-prod">POR</span> <span class="preco-prod">R$ {{number_format($destaque->preco, 2, ',', ' ')}}</span></div>						
					<div class="juros-prod">ou 10x sem juros de R$ {{number_format($destaque->preco/10, 2, ',', ' ')}}</div>
				</a>
			</div>
		</div>
	@endforeach
@stop