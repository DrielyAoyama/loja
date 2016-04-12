@extends('layout.lojaindex')

@section('titulo', 'Loja')


@section('oferta_do_dia')
	<a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Oferta do dia</a>
	<span> Adquira 20% de desconto em comprar superiores a R$100,00 </span>
@stop



@section('links_topo')
    <ul class="menu">
    	@if(!Auth::check())
	        <li>
	        	<a href="#" data-toggle="modal" data-target="#login-modal">Logar</a>
	        </li>
	        <li>
	        	<a href="register.html">Registrar-se</a>        
	        </li>
	    @else

	    @endif
        <li>	
        	<a href="contact.html">Contato</a>
        </li>        
    </ul>
@stop


@section('login_cliente')
	<div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
            	<label>Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email">
            </div>
            <div class="form-group">
            	<label>Email</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="password">
            </div>

            <p class="text-center">
                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Logar</button>
            </p>

            </form>

            <p class="text-center text-muted">Não é cadastrador ainda ?</p>
            <p class="text-center text-muted"><a href=""><strong>Cadastre-se Agora</strong></a>! É fácil, demora apenas 1 minuto e lhe da acesso
            a descontos especiais e muitos mais!</p>

    </div> 
@stop

@section('logo_grande')
	{{asset('/layout/templateloja/img/logo.png')}}
@stop

@section('logo_pequeno')
	{{asset('/layout/templateloja/img/logo-small.png')}}
@stop


@section('menu')

	@for ($i = 0; $i < 2 ; $i++)
		<li class="dropdown yamm-fw">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Categoria <b class="caret"></b></a>
	            <ul class="dropdown-menu">
	                <li>
	                              <!-- /.yamm-content -->
	                    <div class="yamm-content">
	                        <div class="row">
	                            <div class="col-sm-3">
	                                <h5>sub Categoria 1</h5>
	                                <ul>
	                                    <li><a href="category.html">sub sub Categoria 1</a></li>
	                                    <li><a href="category.html">sub sub Categoria 2</a></li>
	                                    <li><a href="category.html">sub sub Categoria 3</a></li>
	                                </ul>
	                            </div>
	                            <div class="col-sm-3">
	                                <h5>sub Categoria 2</h5>
	                                <ul>
	                                    <li><a href="category.html">sub sub Categoria 1</a></li>
	                                    <li><a href="category.html">sub sub Categoria 2</a></li>
	                                    <li><a href="category.html">sub sub Categoria 3</a></li>
	                                </ul>
	                            </div>
	                            <div class="col-sm-3">
	                                <h5>sub Categoria 3</h5>
	                                <ul>
	                                    <li><a href="category.html">sub sub Categoria 1</a></li>
	                                    <li><a href="category.html">sub sub Categoria 2</a></li>
	                                    <li><a href="category.html">sub sub Categoria 3</a></li>
	                                </ul>
	                            </div>                                                           
	                        </div>
	                </div>
	                <!-- /.yamm-content -->
	            </li>
	        </ul>
	    </li>
	@endfor
@stop



@section('txt_carrinho')
	3 itens no carrinho
@stop




@section('itens_slider_principal')
	<div class="item">
        <img src="{{asset('/layout/templateloja/img/main-slider1.jpg')}}" alt="" class="img-responsive">
    </div>
        <div class="item">
    <img class="img-responsive"src="{{asset('/layout/templateloja/img/main-slider2.jpg')}}" alt="">
        </div>
    <div class="item">
        <img class="img-responsive" src="{{asset('/layout/templateloja/img/main-slider3.jpg')}}" alt="">
    </div>
    <div class="item">
        <img class="img-responsive" src="{{asset('/layout/templateloja/img/main-slider4.jpg')}}" alt="">
    </div>
@stop



@section('vantagens')
	<div class="container">
        <div class="same-height-row">
            <div class="col-sm-4">
                <div class="box same-height clickable">
                    <div class="icon">
                    	<i class="fa fa-heart"></i>
                    </div>

	                <h3><a href="#">AMAMOS NOSSOS CLIENTEs</a></h3>
	                <p>Nos preparamos para oferecer as melhores condições de serviço possível.</p>
            	</div>
        	</div>

        	<div class="col-sm-4">
            	<div class="box same-height clickable">
              		<div class="icon">
              			<i class="fa fa-tags"></i>
              		</div>

	          		<h3><a href="#">MELHORES PREÇOS</a></h3>
	            	<p>Os melhores produtos pelos melhores preços é só aqui</p>
        		</div>
            </div>

            <div class="col-sm-4">
                <div class="box same-height clickable">
                    <div class="icon">
                    	<i class="fa fa-thumbs-up"></i>
                    </div>

                    <h3><a href="#">Garantia de satisfação</a></h3>
                    <p>Garantimos sua satisfação</p>
                </div>
            </div>
        </div>
                    <!-- /.row -->
    </div>
@stop


@section('itens_slider_mais_vendidos')
	@foreach ($qtde_vendida as $produto)
	<div class="item">
	        <div class="product">
	            <div class="flip-container">
	                <div class="flipper">
	                    <div class="front">
	                        <a href="{{asset('/layout/templateloja/detail.html')}}">
	                            <img src="{{asset('/layout/templateloja/img/product1.jpg')}}" alt="" class="img-responsive">
	                        </a>
	                    </div>
		                <div class="back">
		                    <a href="{{asset('/layout/templateloja/detail.html')}}">
		                        <img src="{{asset('/layout/templateloja/img/product1_2.jpg')}}" alt="" class="img-responsive">
		                    </a>
		                </div>
	           		</div>
	        	</div>
		        <a href="{{asset('/layout/templateloja/detail.html')}}" class="invisible">
		            <img src="{{asset('/layout/templateloja/img/product1.jpg')}}" alt="" class="img-responsive">
		        </a>
		        <div class="text">
		            <h3><a href="{{asset('/layout/templateloja/detail.html')}}">{{$produto->nome}}</a></h3>
		                <p class="price">R$ {{number_format($produto->preco, 2, ',', ' ')}}  </p>
		        </div>
	    	</div>
		</div>
	@endforeach
@stop


@section('redes_sociais')
<h4>Redes Sociais</h4>
    <p class="social">
        <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
        <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
        <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
        <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
    </p>
@stop