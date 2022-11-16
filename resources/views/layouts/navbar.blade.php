<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Bali Tours</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ("img/logo-travel.jpg") }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/touchTouch.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="{{ asset('js/user/jquery.js') }}"></script>
    <script src="{{ asset('js/user/jquery-migrate-1.1.1.js') }}"></script>
    <script src="{{ asset('js/user/sForm.js') }}"></script>
    <script src="{{ asset('js/user/superfish.js') }}"></script>
    <script src="{{ asset('js/user/jquery.jqtransform.js') }}"></script>
    <script src="{{ asset('js/user/jquery.equalheights.js') }}"></script>
    <script src="{{ asset('js/user/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/user/tms-0.4.1.js') }}"></script>
    <script src="{{ asset('js/user/jquery-ui-1.10.3.custom.min.js') }}"></script>
    <script src="{{ asset('js/user/jquery.ui.totop.js') }}"></script>
    
    
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body class="page1">
<header>
  <div class="container_12">
    <div class="grid_12">
    
      <h1><a href="index.html"><img src="{{ asset ("img/logo-travel.jpg") }}" alt=""></a></h1>
      <div class="clear"></div>
    </div>
    <div class="menu_block">
      <nav>
        <ul class="sf-menu">
          <li class="{{ (request()->route()->getName()=='dashboard')?'current':''}}"><a href="{{ url('/') }}">Home</a></li>
          <li class="with_ul"><a href="about.html">Tours</a>
            <ul>
              <li><a href="#">Agency</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Team</a></li>
            </ul>
          </li>
          <li><a href="gallery.html">Cars</a></li>
          <li class="{{ (request()->route()->getName()=='gallery_user')?'current':''}}"><a href="{{ url('/home/gallery') }}">Gallery</a></li>
          <li class="{{ (preg_match('/contact/i',request()->route()->getName())==1)?'current':''}}"><a href="{{ url('/home/contact') }}">Contacts</a></li>
          @auth
            <li class="{{ (preg_match('/profile/i',request()->route()->getName())==1)?'current':''}}"><a href="{{ url('/home/profile') }}">Account</a></li>
          @else
            <li><a href="{{ url('/login') }}">Login</a></li>
          @endauth
        </ul>
      </nav>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</header>
@yield('main')
<footer>
  <div class="container_12">
    <div class="grid_12">
      <div class="copy">&copy; Copyright Bali Tours. All Rights Reserved</div>
    </div>
    <div class="clear"></div>
  </div>
</footer>
<script>
    $(window).load(function () {
        $().UItoTop({
            easingType: 'easeOutQuart'
        });
    });
</script>
    @yield('js')
</body>
</html>