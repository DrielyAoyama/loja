
    <!--<img src="{{asset('/layout/imagens/logo_alive.png')}}">-->


<html>
  <head>
   <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('/layout/bootstrap/css/bootstrap.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/layout/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/layout/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/layout/dist/css/skins/_all-skins.min.css')}}">

    <link rel="stylesheet" href="{{asset('/layout/css/custom.css')}}">

    <link rel="icon" type="image/ico" href="{{asset('/layout/imagens/favicon.ico')}}" />
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini" title="Voltar a loja"><img style="height:45px;padding-top: 10px;" src="{{asset('/layout/imagens/logo_lite.png')}}"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <ul class="dropdown-menu">

                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <ul class="dropdown-menu">

                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
             

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
           
            <div class="pull-left info">
              
            </div>
          </div>


        
       


      </aside>

      <div class="content-wrapper">

    




          @yield('caminho')


    <!--conteudo-->
    <section class="content">
         
          @yield('conteudo')
        
         
    </section>
    <!--/conteudo-->




  </div>
  </div><!-- /.content-wrapper -->
 <footer class="main-footer">
        <div class="pull-right hidden-xs" style="margin-top: -10px;">
          <b><span class="glyphicon glyphicon-home" style="padding-right: 10px;"></span>  Rua Lorem ipsum dolor sit amet, ,</b> 000 - <b> Lorem ipsum</b><br>
          <span class="glyphicon glyphicon-earphone" style="padding-right: 10px">       (00)0000-0000   -   (00)00000-0000</span>       
        </div>
        <strong><a href="http://litecommerce.com.br">www.litecommerce.com.br</a></strong>        
      </footer>


      
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('/layout/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('/layout/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/layout/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/layout/dist/js/app.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('/layout/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('/layout/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('/layout/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{asset('/layout/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{asset('/layout/plugins/chartjs/Chart.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('/layout/dist/js/pages/dashboard2.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/layout/dist/js/demo.js')}}"></script>
  </body>
</html>