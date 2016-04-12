<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('titulo')</title>
<link type="text/css" rel="stylesheet" href="{{asset('layout/templateloja/css/style.css')}}" media="all">
<link type="text/css" rel="stylesheet" href="{{asset('layout/templateloja/css/icones.css')}}" media="all">
<link  rel= "stylesheet"  href= "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" >
<link rel= "stylesheet" type="bootstrap"  href= "{{asset('layout/templateloja/css/bootstrap/bootstrap.css')}}" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/styleIE.css" />
<![endif]-->
</head>
<body class="body-style">

<!-- TOPO -->

<div class="topo">
	<div class="container">
	<div class="row">
	  <div class="col-xs-12 col-md-12 border-topo">
	  		
		<div class="container barra-topo" >
			<div class="row">

				<div class="col-xs-6">
					<div class="barra-topo-texto"></div>
				</div>
				<div class="col-xs-6">
					<ul>
						<a href="#"><li>Login</li></a>
						<a href="#"><li>Registre-se</li></a>
						<a href="#"><li>Contato</li></a>
					</ul>
				</div>

			</div>
		</div>

		<div class="container barra-paginas" >
			<div class="row">

				<div class="col-xs-6 col-md-2">
					<div class="logo-topo"><a href="#"><img width="150px" height="150px" src="{{asset('layout/templateloja/recorte/logo_coffe_porto-01.png')}}"></a></div>
				</div>

				<div class="col-xs-6 col-md-8 barra-paginas-div">
					<ul>
						<a href="#"><li>Home</li></a>
						<a href="#"><li>Produto</li></a>
						<a href="#"><li>Catalogo</li></a>
						<a href="#"><li>Contato</li></a>
					</ul>
				</div>

				<div class="col-xs-6 col-md-2 div-botao">
					<a href="#"><div class="botao-compra"><img width="30px" height="30px" src="{{asset('layout/templateloja/recorte/carrinho.png')}}"> Meu Carrinho</div></a>
				</div>
				
			</div>
		</div>

	  </div>
	</div>
	</div>
</div>

<!-- FIM TOPO -->

<!-- BANNER -->

<div class="container" >
	<div class="borda-desc">
		<img width="100%"src="{{asset('layout/templateloja/recorte/bg-banner-top-2.jpg')}}">
	</div>
</div>

<!-- FIM BANNER -->

<!-- CORPO DA PÁGINA PRINCIPAL -->

<div class="container" >
<div class="row">
  	<div class="col-xs-12 col-sm-6 col-md-12">
  		<div class="prod-home">
			<div class="row">
 				@yield('produtos_index')
  				
			</div>
		</div>
  	</div>
</div>
</div>

<!-- FIM CORPO DA PÁGINA PRINCIPAL -->

<!-- BARRA DE CONTATOS -->

<div class="barra-contatos">
	<div class="container">
		<div  class= "row row-cont" > 
  			
  			<div  class= "col-md-3" >
  				<div class="tit-cont">INSTITUCIONAL</div>
  				<div class="tit-link"><a href="#">Quem somos</a></div>
				<div class="tit-link"><a href="#">Política de privacidade</a></div>
  			</div> 

  			<div  class= "col-md-3" >
  				<div class="tit-cont">AJUDA E SUPORTE</div>
  				<div class="tit-link"><a href="#">Como comprar</a></div>
				<div class="tit-link"><a href="#">Formas de pagamento</a></div>
				<div class="tit-link"><a href="#">Segurança</a></div>
				<div class="tit-link"><a href="#">Formas de envio</a></div>
				<div class="tit-link"><a href="#">Trocas e devoluções</a></div>
  			</div> 

  			<div  class= "col-md-3" >
  				<div class="tit-cont">ÁREA DO CLIENTE</div>
  				<div class="tit-link"><a href="#">Fale conosco</a></div>
				<div class="tit-link"><a href="#">Minha conta</a></div>
				<div class="tit-link"><a href="#">Meus pedidos</a></div>
				<div class="tit-link"><a href="#">Cadastre-se</a></div>
  			</div> 

  			<div  class= "col-md-3" >
  				<div class="tit-cont">SIGA-NOS</div>
  					<div class="tit-rede">
  						<a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook-square"></i></a>
  						<a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter-square"></i></a>
  						<a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus-square"></i></a>
  					</div>
  			</div> 

		</div> 
	</div>
</div>

<!-- FIM BARRA DE CONTATOS -->

<!-- JQUERY -->

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<!-- FIM JQUERY -->

</body>
</html>
