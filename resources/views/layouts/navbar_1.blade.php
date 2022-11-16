<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
	<link rel="stylesheet" href="{{ asset('css/touchTouch.css') }}">
	<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar/bootstrap.min.css') }}">
	<link href="{{ asset('css/account_setting/style.css') }}" rel="stylesheet"></link>
	
    
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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	@yield('css')
    
  </head>
  <body>
    @include('sweetalert::alert')
    <header>
    <!-- Navbar  -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 {{ (request()->route()->getName()=='dashboard')?'':'bg-dark'}}" style="padding:0 0 0 0 !important;min-height:96px;">
            <div class="container" style="margin:0 0 0 0;max-width:72rem !important;">
                <h1 id="fh5co-logo" style="margin:0 0 0 0;font-size:30px;"><a href="{{ url('/') }}"><img src="{{ asset ("img/logo_primary.png") }}" style="height:54px; width:10.72vw !important;"></a></h1>
                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
                style="float:right;"
                >
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav" style="width:900px;">
                    <ul class="navbar-nav sf-menu justify-content-center" id="fh5co-primary-menu" style="margin-left:12.9vw !important;margin-top:0 !important;">
                        <li class="{{ (request()->route()->getName()=='dashboard')?'active':''}}"><a class="{{ (request()->route()->getName()=='dashboard')?'':'nav-link text-white'}}" href="{{ url('/') }}">Home</a></li>
						<li>
							<a href="#" class="fh5co-sub-ddown nav-link text-white">Packages</a>
							<ul class="fh5co-sub-menu">
								<li><a href="{{ url('/home/optional_package') }}">Optional Packages</a></li>
								<li><a href="{{ url('/home/tour_package') }}">Tour Packages</a></li>
							</ul>
						</li>
						<li class="{{ (request()->route()->getName()=='user_car.list')?'active':''}}"><a href="{{ url('/home/car') }}" class="{{ (request()->route()->getName()=='user_car.list')?'':'nav-link text-white'}}">Cars</a></li>
						<li class="{{ (request()->route()->getName()=='gallery_user')?'active':''}}"><a class="{{ (request()->route()->getName()=='gallery_user')?'':'nav-link text-white'}}" href="{{ url('/home/gallery') }}">Gallery</a></li>
						<li class="{{ (preg_match('/contact/i',request()->route()->getName())==1)?'active':''}}" style="margin-right:18vw;"><a class="{{ (preg_match('/contact/i',request()->route()->getName())==1)?'':'nav-link text-white'}}" href="{{ url('/home/contact') }}">Contacts</a></li>
						@auth
							<li class="{{ (preg_match('/profile/i',request()->route()->getName())==1)?'active':''}} login"><a class="{{ (preg_match('/profile/i',request()->route()->getName())==1)?'':'nav-link text-white'}}" href="{{ url('/home/profile') }}">Account</a></li>
						@else
							<li class="login"><a class="nav-link text-white" href="{{ url('/login') }}" >Login</a></li>
							<li><a class="nav-link text-white" href="{{ url('/register') }}">Register</a></li>
						@endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('main')

    <footer style="margin-top:10vh;  ">
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
           						<span style="color:white;">Jl Surabi Gg. II no 3, Denpasar Timur, Bali</span>
							</li>
							<li>
								<i class="fa fa-envelope" ></i>
								<span style="color:white;">infohappytripbali@gmail.com </span>
							</li>
							<li>
								<i class="fa fa-phone" ></i>
								<span style="color:white;">+6282146474746 </span>
								<br>
								<i class="fa fa-phone" ></i>
								<span style="color:white;">+6287743360550 </span>
							</li>
							<li>
								<i class="fa fa-instagram"></i>
								<span style="color:white;">@happy.tripbali</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p class="fh5co-social-icons">
							<a href=""><i class="icon-twitter2"></i></a>
							<a href="#"><i class="icon-facebook2"></i></a>
							<a href="https://www.instagram.com/happy.tripbali/"><i class="icon-instagram"></i></a>
							<a href="#"><i class="icon-dribbble2"></i></a>
							<a href="#"><i class="icon-youtube"></i></a>
						</p>
						<p>&copy; Copyright Bali Tours. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

    <!-- <div style="margin-bottom:30px;">
        
        <div data-stellar-background-ratio="0.5" style="width:100%;">
            <div
                id="introCarousel"
                class="carousel slide carousel-fade shadow-2-strong"
                data-mdb-ride="carousel"
                >
               
                <div class="carousel-inner">
          
					<div class="carousel-item active">
						<video
							style="min-width: 100%; min-height: 100%"
							playsinline
							autoplay
							muted
							loop
							>
						<source
								class=""
								src="{{ asset ("video/CLIP.mp4") }}"
								type="video/mp4"
								/>
						</video>
					
					</div>
				
             
                </div>
           
            </div>
   
        </div>

    </div> -->

    <script src="{{ asset('js/navbar/bootstrap.bundle.min.js') }}"></script>
    @yield('js')
  </body>
</html>
