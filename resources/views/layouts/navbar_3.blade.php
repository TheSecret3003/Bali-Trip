<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<title>Bali Tours</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ("img/logo_terakhir.png") }}" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('css/user_1/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('css/user_1/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="{{ asset('css/user_1/superfish.css') }}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('css/user_1/magnific-popup.css') }}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('css/user_1/bootstrap-datepicker.min.css') }}">
	<!-- CS Select -->
	<link rel="stylesheet" href="{{ asset('css/user_1/cs-select.css') }}">
	<link rel="stylesheet" href="{{ asset('css/user_1/cs-skin-border.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/user_1/style_1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_1/mdb.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/touchTouch.css') }}">
	<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />



	<!-- Modernizr JS -->
	<script src="{{ asset('js/user_1/modernizr-2.6.2.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('js/user_1/jquery.min.js') }}"></script>
	
    <!-- jQuery Easing -->
    <script src="{{ asset('js/user_1/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/user_1/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('js/user_1/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/user_1/sticky.js') }}"></script>

    <!-- Stellar -->
    <script src="{{ asset('js/user_1/jquery.stellar.min.js') }}"></script>
    <!-- Superfish -->
    <script src="{{ asset('js/user_1/hoverIntent.js') }}"></script>
    <script src="{{ asset('js/user_1/superfish.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('js/user_1/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/user_1/magnific-popup-options.js') }} "></script>
    <!-- Date Picker -->
    <script src="{{ asset('js/user_1/bootstrap-datepicker.min.js') }}"></script>
    <!-- CS Select -->
    <script src="{{ asset('js/user_1/classie.js') }}"></script>
    <script src="{{ asset('js/user_1/selectFx.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/user_1/main.js') }}"></script>
	<script src="https://use.fontawesome.com/5bb81504e3.js"></script>
	<script src="https://kit.fontawesome.com/f00f878d48.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	@yield('css')

</head>
<body>
	@include('sweetalert::alert')
	<header id="fh5co-header-section" class="sticky-banner">
		<div class="container" style="margin:0 0 0 0;max-width:1500px !important;dispay:inline-flex;">
			<div class="nav-header" style="padding:0 15px;">
				<a href="{{ url('/') }}" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
				<h1 id="fh5co-logo" style="margin:0 0 0 0;"><a href="{{ url('/') }}"><img src="{{ asset ("img/logo_terakhir.png") }}" style="height:96px;">Happy Trip Bali</a></h1>
				<!-- START #fh5co-menu-wrap -->
				<nav id="fh5co-menu-wrap" role="navigation">
						
					<ul class="sf-menu" id="fh5co-primary-menu">
						<li class="{{ (request()->route()->getName()=='dashboard')?'active':''}}"><a href="{{ url('/') }}">Home</a></li>
						<li>
							<a href="#" class="fh5co-sub-ddown">Packages</a>
							<ul class="fh5co-sub-menu">
								<li><a href="{{ url('/home/optional_package') }}">Optional Packages</a></li>
								<li><a href="{{ url('/home/tour_package') }}">Tour Packages</a></li>
							</ul>
						</li>
						<li class="{{ (request()->route()->getName()=='user_car.list')?'active':''}}"><a href="{{ url('/home/car') }}">Cars</a></li>
						<li class="{{ (request()->route()->getName()=='gallery_user')?'active':''}}"><a href="{{ url('/home/gallery') }}">Gallery</a></li>
						<li class="{{ (preg_match('/contact/i',request()->route()->getName())==1)?'active':''}}"><a href="{{ url('/home/contact') }}">Contacts</a></li>
						@auth
							<li class="{{ (preg_match('/profile/i',request()->route()->getName())==1)?'active':''}}"><a href="{{ url('/home/profile') }}">Account</a></li>
						@else
							<li><a href="{{ url('/login') }}">Login</a></li>
						@endauth
					</ul>
					
				
				</nav>
			</div>
		</div>
	</header>

	<!-- end:header-top -->
    @yield('main')

	
	<footer>
		<div id="footer">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-8 col-sm-8 col-xs-12 fh5co-footer-link">
						<h3>About Travel</h3>
						<p>Bali Tours is local company from bali. We are proud to offer to you to many kind of variety tour and we have a reliable driver from Bali who is professional, responsible and friendly. for make your memories unforgettable in bali.</p>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 fh5co-footer-link">
						<h3>Contact Us:</h3>
						<ul>
							<li>
								<i class='fas fa-map-marker-alt'></i>
           						<span style="color:white;">Abiansemal, Kab. Badung, Bali 80352 </span>
							</li>
							<li>
								<i class="fa fa-envelope" ></i>
								<span style="color:white;">balitours@gmail.com </span>
							</li>
							<li>
								<i class="fa fa-phone" ></i>
								<span style="color:white;">+6283117580889 </span>
							</li>
							<li>
								<i class="fab fa-facebook-f"></i>
								<span style="color:white;">balitours </span>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">
						<p class="fh5co-social-icons">
							<a href="#"><i class="icon-twitter2"></i></a>
							<a href="#"><i class="icon-facebook2"></i></a>
							<a href="#"><i class="icon-instagram"></i></a>
							<a href="#"><i class="icon-dribbble2"></i></a>
							<a href="#"><i class="icon-youtube"></i></a>
						</p>
						<p>&copy; Copyright Bali Tours. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</footer>



</div>


</div>
@yield('js')
</body>
</html>
