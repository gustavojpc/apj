<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title')</title>
  <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Chartisan -->

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/a52957689f.js" crossorigin="anonymous"></script>
  <!-- IonIcons -->
  <link rel="stylesheet" href="{{ asset(' http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>



    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <span class="brand-text font-weight-light"><b>Painel Administrador APJ</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
          <a href="#" class="d-block"> <i class="fa fa-user" aria-hidden="true"></i>  {{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{url('admin/pedidos')}}" class="nav-link active">
                    <i class="fas fa-comment-dollar"></i>
                    <p>
                    Pedidos
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-box-open"></i>
                  <p>
                    Produtos
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('produto.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista de produtos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('produto.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Adicionar produtos</p>
                    </a>
                  </li>

                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-list"></i>
                  <p>
                    Categorias
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('categoria.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista de categorias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('categoria.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Adicionar categoria</p>
                    </a>
                  </li>

                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="fas fa-list"></i>
                  <p>
                    Unidades
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('unidade.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lista de unidades</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('unidade.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Adicionar unidade</p>
                    </a>
                  </li>

                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-file-invoice-dollar"></i>

                  <p>
                    Relatórios
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('admin/relatorio/dashboard')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                    </li>
                  <li class="nav-item">
                    <a href="{{url('admin/relatorio/vendas')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Vendas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/relatorio/clientes')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Clientes</p>
                    </a>
                  </li>


                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    <p>
                    Logout
                    </p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

    <!-- /.content-header -->

    <!-- Main content -->


    @yield('content')


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="">APJ</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js') }} "></script>
<script src="{{ asset('assets/admin/js/demo.js') }} "></script>
<script src="{{ asset('assets/admin/js/pages/dashboard3.js') }}"></script>
</body>
</html>
