<!DOCTYPE html>
<html>
<head>
<title>How to Disable Specific Dates in Bootstrap Datepicker using jQuery?</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                </ul>
            </nav>
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
          </li>
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
        <img src="{{ asset ("img/logo-travel.jpg") }}" alt="Bali Tours" class="brand-image img-circle elevation-3"
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
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                <a href="{{ url('/') }}" class="nav-link {{ (preg_match('/dashboard/i',request()->route()->getName())==1)?'active':''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    DASHBOARD
                    </p>
                </a>
                </li>
                <li class="nav-item has-treeview {{ (preg_match('/package/i',request()->route()->getName())==1)?'menu-open':''}}">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                        PAKET
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ url('/package') }}" class="nav-link {{ (preg_match('/package.index/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Paket</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ url('/package/add') }}" class="nav-link {{ (preg_match('/package.add/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buat Paket</p>
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (preg_match('/destination/i',request()->route()->getName())==1)?'menu-open':''}}">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-bus"></i>
                        <p>
                        DESTINASI
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ url('/destination') }}" class="nav-link {{ (preg_match('/destination.index/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Destinasi</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ url('/destination/add') }}" class="nav-link {{ (preg_match('/destination.add/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Destinasi</p>
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (preg_match('/restaurant/i',request()->route()->getName())==1)?'menu-open':''}}">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>
                        RESTORAN
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ url('/restaurant') }}" class="nav-link {{ (preg_match('/restaurant.index/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Restoran</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ url('/restaurant/add') }}" class="nav-link {{ (preg_match('/restaurant.add/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Restoran</p>
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (preg_match('/ticket/i',request()->route()->getName())==1)?'menu-open':''}}">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>
                        TIKET
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ url('/ticket') }}" class="nav-link {{ (preg_match('/ticket.index/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar Tiket</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ url('/ticket/add') }}" class="nav-link {{ (preg_match('/ticket.add/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Tiket</p>
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (preg_match('/user/i',request()->route()->getName())==1)?'menu-open':''}}">
                    <a class="nav-link">
                        <i class="nav-icon fas fas fa-hands"></i>
                        <p>
                        USER
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link {{ (preg_match('/user.index/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar User</p>
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (preg_match('/order/i',request()->route()->getName())==1)?'menu-open':''}}">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                        PESANAN
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ url('/order/add') }}" class="nav-link {{ (preg_match('/order.add/i',request()->route()->getName())==1)?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Buat Pesanan</p>
                        </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    
      </div>
      <!-- /.sidebar -->
    </aside>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 mt-5">
                    <div class="card">
                        <div class="card-header">How to Disable Specific Dates in Bootstrap Datepicker using jQuery?</div>
                        <div class="card-body">
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="text" class="form-control datepicker" placeholder="Date" name="date">
                                </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- /.control-sidebar -->
  </div>

    

    <!-- jQuery library -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">

        var datesForDisable = ["09-20-2022", "08-10-2021", "08-15-2021", "08-20-2021"]

        $('.datepicker').datepicker({
            format: 'mm-dd-yyyy',
            autoclose: true,
            todayHighlight: true,
            startDate: new Date(),
            datesDisabled: datesForDisable
        });
    </script>
</body>
</html>