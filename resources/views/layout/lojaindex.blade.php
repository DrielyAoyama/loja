<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
         @yield('titulo')
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{asset('/layout/templateloja/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('/layout/templateloja/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/layout/templateloja/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/layout/templateloja/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('/layout/templateloja/css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{asset('/layout/templateloja/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{asset('/layout/templateloja/css/custom.css')}}" rel="stylesheet">

    <script src="{{asset('/layout/templateloja/js/respond.min.js')}}"></script>

    <link rel="shortcut icon" href="{{asset('/layout/templateloja/favicon.png')}}">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                @yield('oferta_do_dia')
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                @yield('links_topo')               
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Login de cliente</h4>
                    </div>
                     @yield('login_cliente')
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                    <img src="@yield('logo_grande')" style="width: 137px;height: 60px;" class="hidden-xs">
                    <img src="@yield('logo_pequeno')" style="width: 93px;height: 60px;" class="visible-xs"><span class="sr-only"></span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only"></span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"></span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="#">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs"></span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="/">Início</a></li>
                    @yield('menu')
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">@yield('txt_carrinho')</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"></span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <!-- form pesquisa -->
                <form class="navbar-form" role="search" action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Procurar...">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <!-- form pesquisa -->

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        @yield('itens_slider_principal')                        
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">
                @yield('vantagens')  
            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Mais vendidos</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        @yield('itens_slider_mais_vendidos') 
                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>



        </div>
        
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Páginas</h4>

                        <ul>
                            <li><a href="#">Sobre</a>
                            </li>
                            <li><a href="#">Contato</a>
                            </li>
                        </ul>
                       

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Operações de cliente</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="#">Registrar-se</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Onde nos encontrar</h4>

                        <p><strong>Lorem ipsum</strong>
                            <br>000 Lorem ipsumLorem ipsum
                            <br>Lorem ipsumLorem ipsum
                            <br>Lorem ipsum
                            <br>Lorem ipsum
                            <br>
                        </p>
                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Receber novidades</h4>

                        <p class="text-muted">Cadastre seu email para receber novidades diretamente em sua caixa de entrada.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

                                    <button class="btn btn-default" type="button">Inscreva-se</button>

                                </span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>
                        @yield('redes_sociais') 
                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <p class="pull-right"><a href="http://bootstrapious.com/e-commerce-templates">www.litecommerce.com.br</a><a href="http://kakusei.cz"></a> 
                    </p>
                </div>
            </div>
        </div>



    </div>

    <script src="{{asset('/layout/templateloja/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('/layout/templateloja/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/layout/templateloja/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('/layout/templateloja/js/waypoints.min.js')}}"></script>
    <script src="{{asset('/layout/templateloja/js/modernizr.js')}}"></script>
    <script src="{{asset('/layout/templateloja/js/bootstrap-hover-dropdown.js')}}"></script>
    <script src="{{asset('/layout/templateloja/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/layout/templateloja/js/front.js')}}"></script>


</body>

</html>