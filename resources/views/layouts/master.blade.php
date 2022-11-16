<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bali Tours</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset ("img/logo_terakhir.png") }}" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}"> 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
@include('sweetalert::alert')
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          @yield('navlinks')
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <button class="btn btn-danger" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style = "background-color:#010336">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{ asset ("img/logo_terakhir.png") }}" alt="Bali Tours" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: Bremen">Bali Tours</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset ("img/user.jpg") }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        @yield('sidebar')
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    @yield('content')
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery.table2excel.js') }}"></script>
  <script src="{{ asset('js/jquery.table2excel.min.js') }}"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @yield('js')
</body>

</html>