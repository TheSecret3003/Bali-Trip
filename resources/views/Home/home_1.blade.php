@extends('layouts.navbar_1')

@section('main')
<div class="main">
    <div style="margin-bottom:30px;">
        
        <div data-stellar-background-ratio="0.5" style="width:100%;">
            <!-- Carousel wrapper -->   
            <div
                id="introCarousel"
                class="carousel slide carousel-fade shadow-2-strong"
                data-mdb-ride="carousel"
                >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li
                    data-mdb-target="#introCarousel"
                    data-mdb-slide-to="0"
                    class="active"
                    ></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
                </ol>
            
                <!-- Inner -->
                <div class="carousel-inner">
                <!-- Single item -->
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
						<!-- <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
						<div class="d-flex justify-content-center align-items-center h-100">
							<div class="text-white text-center">
							<h1 class="mb-3" style="font-size:72px;">Explore the Beauty of Bali</h1>
							</div>
						</div>
						</div> -->
					</div>
				
                <!-- Single item -->
					<div class="carousel-item">
						<img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(22).webp" class="d-block w-100 h-100" alt="Canyon at Nigh"/>
					</div>
            
                <!-- Single item -->
					<div class="carousel-item">
					<img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="d-block w-100 h-100" alt="Wild Landscape"/>
					</div>
                </div>
                <!-- Inner -->
            
                <!-- Controls -->
                <a
                class="carousel-control-prev"
                href="#introCarousel"
                role="button"
                data-mdb-slide="prev"
                >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a
                class="carousel-control-next"
                href="#introCarousel"
                role="button"
                data-mdb-slide="next"
                >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Carousel wrapper -->
        </div>

    </div>

	

    <div id="fh5co-tours" class="fh5co-section-gray" style="margin-top:0;padding:0;">
        <div class="tours-cars" >
            <div class="row">
                <div class="col-md-12 text-center heading-section animate-box">
                    <h3>Top Tours</h3>
                </div>
            </div>
            <div class="row">
			@if($packages->count() > 2)
				@for($i=0;$i< 3;$i++)
					@if($packages[$i]->type != 'tour')
						<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
							<div><img src="{{ $packages[$i]->image }}" alt="{{ $packages[$i]->name }}" class="img-responsive">
								<div class="desc">
									<span></span>
									<h3>{{ $packages[$i]->name }}</h3>
									<span style="font-size:16px;">{{ $packages[$i]->count_destination }} Destinations + {{ $packages[$i]->count_restaurant }} Restaurants</span>
									<span class="price">Rp{{ number_format($packages[$i]->price) }}</span>
									<a class="btn btn-primary btn-outline" href="{{ route('optional_package.info', $packages[$i]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
								</div>
							</div>
						</div>
					@else
						<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
							<div><img src="{{ $packages[$i]->image }}" alt="{{ $packages[$i]->name }}" class="img-responsive">
								<div class="desc">
									<span></span>
									<h3>{{ $packages[$i]->name }}</h3>
									<span style="font-size:16px;">{{$packages[$i]->count_day}} days + {{$packages[$i]->count_hotel}} hotels </span>
									<span style="font-size:16px;">{{ $packages[$i]->count_destination }} Destinations + {{ $packages[$i]->count_restaurant }} Restaurants</span>
									<span class="price">Rp{{ number_format($packages[$i]->price) }}</span>
									<a class="btn btn-primary btn-outline" href="{{ route('tour_package.info', $tour_packages[$i]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
								</div>
							</div>
						</div>
					@endif
				@endfor
			@endif
			</div>
        </div>
    </div>

    <div id="fh5co-tours" class="fh5co-section-gray" style="padding-bottom:0;">
			<div class="tours-cars">
				<div class="row">
					<div class="col-md-12 text-center heading-section animate-box">
						<h3>Optional Tours</h3>
					</div>
				</div>
				<div class="row">
				@if($optional_packages->count() > 2)
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div><img src="{{ $optional_packages[0]->image }}" alt="{{ $optional_packages[0]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $optional_packages[0]->name }}</h3>
								<span style="font-size:16px;">{{ $optional_packages[0]->count_destination }} Destinations + {{ $optional_packages[0]->count_restaurant }} Restaurants</span>
								<span class="price">Rp{{ number_format($optional_packages[0]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('optional_package.info', $optional_packages[0]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="{{ $optional_packages[1]->image }}" alt="{{ $optional_packages[1]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $optional_packages[1]->name }}</h3>
								<span style="font-size:16px;">{{ $optional_packages[1]->count_destination }} Destinations + {{ $optional_packages[1]->count_restaurant }} Restaurants</span>
								<span class="price">Rp{{ number_format($optional_packages[1]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('optional_package.info', $optional_packages[1]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="{{ $optional_packages[2]->image }}" alt="{{ $optional_packages[2]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $optional_packages[2]->name }}</h3>
								<span style="font-size:16px;">{{ $optional_packages[2]->count_destination }} Destinations + {{ $optional_packages[2]->count_restaurant }} Restaurants</span>
								<span class="price">Rp{{ number_format($optional_packages[2]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('optional_package.info', $optional_packages[2]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="{{ url('/home/optional_package') }}">See All Offers <i class="icon-arrow-right22"></i></a></p>
					</div>
				@endif
				</div>
			</div>
		</div>
    </div>

    <div id="fh5co-tours" class="fh5co-section-gray">
			<div class="tours-cars">
				<div class="row">
					<div class="col-md-12 text-center heading-section animate-box">
						<h3>Package Tours</h3>
					</div>
				</div>
				<div class="row">
				@if($tour_packages->count() > 2)
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div><img src="{{ $tour_packages[0]->image }}" alt="{{ $tour_packages[0]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $tour_packages[0]->name }}</h3>
								<span style="font-size:16px;">{{$tour_packages[0]->count_day}} days + {{$tour_packages[0]->count_hotel}} hotels </span>
                                <span style="font-size:16px;">{{ $tour_packages[0]->count_destination }} Destinations + {{ $tour_packages[0]->count_restaurant }} Restaurants</span>
								<span class="price">Rp{{ number_format($tour_packages[0]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('tour_package.info', $tour_packages[0]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div ><img src="{{ $tour_packages[1]->image }}" alt="{{ $tour_packages[1]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $tour_packages[1]->name }}</h3>
								<span style="font-size:16px;">{{$tour_packages[1]->count_day}} days + {{$tour_packages[1]->count_hotel}} hotels </span>
                                <span style="font-size:16px;">{{ $tour_packages[1]->count_destination }} Destinations + {{ $tour_packages[1]->count_restaurant }} Restaurants</span>
								<span class="price">Rp{{ number_format($tour_packages[1]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('tour_package.info', $tour_packages[1]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div><img src="{{ $tour_packages[2]->image }}" alt="{{ $tour_packages[2]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $tour_packages[2]->name }}</h3>
								<span style="font-size:16px;">{{$tour_packages[2]->count_day}} days + {{$tour_packages[2]->count_hotel}} hotels </span>
                                <span style="font-size:16px;">{{ $tour_packages[2]->count_destination }} Destinations + {{ $tour_packages[2]->count_restaurant }} Restaurants</span>
								<span class="price">Rp{{ number_format($tour_packages[2]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('tour_package.info', $tour_packages[2]->id) }}" style="font-size=14px;">Details <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="{{ url('/home/tour_package') }}">See All Offers <i class="icon-arrow-right22"></i></a></p>
					</div>
				@endif
				</div>
			</div>
		</div>
    </div>

    <div class="fh5co-section-gray" style="margin-bottom:80px;">
			<div class="tours-cars">
				<div class="row">
					<div class="col-md-12 text-center heading-section animate-box">
						<h3>Car Packages</h3>
					</div>
				</div>
				<div class="row">
				@if($cars->count() > 2)
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div><img src="{{ $cars[0]->image() }}" alt="{{ $cars[0]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $cars[0]->name }}</h3>
								<span style="font-size:16px;">Max {{$cars[0]->max_person}} person + {{$cars[0]->hours}} hours </span>
								<span class="price">Rp{{ number_format($cars[0]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('user_car.order', $cars[0]->id) }}" style="font-size=14px;">Order Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div><img src="{{ $cars[1]->image() }}" alt="{{ $cars[1]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $cars[1]->name }}</h3>
								<span style="font-size:16px;">Max {{$cars[1]->max_person}} person + {{$cars[1]->hours}} hours </span>
								<span class="price">Rp{{ number_format($cars[1]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('user_car.order', $cars[1]->id) }}" style="font-size=14px;">Order Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div><img src="{{ $cars[2]->image() }}" alt="{{ $cars[2]->name }}" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>{{ $cars[2]->name }}</h3>
								<span style="font-size:16px;">Max {{$cars[2]->max_person}} person + {{$cars[2]->hours}} hours </span>
								<span class="price">Rp{{ number_format($cars[2]->price) }}</span>
								<a class="btn btn-primary btn-outline" href="{{ route('user_car.order', $cars[2]->id) }}" style="font-size=14px;">Order Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="{{ url('/home/car') }}">See All Offers <i class="icon-arrow-right22"></i></a></p>
					</div>
				@endif
				</div>
			</div>
		</div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/user_1/mdb.min.js') }}"></script>
<script type="text/javascript">
	var nav = document.querySelector('nav');

	window.addEventListener('scroll', function () {
	if (window.pageYOffset > 100) {
		nav.classList.add('bg-dark', 'shadow');
	} else {
		nav.classList.remove('bg-dark', 'shadow');
	}
	});
</script>

@endsection