@extends('layouts.navbar_2')

@section('main')
<div class="main" >
    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading-section animate-box" style="margin-top:50px;margin-bottom:80px;">
                    <h3>Tour Packages</h3>
                </div>
            </div>
        </div>
        <div class="tours-cars">
            <div class="row row-bottom-padded-md">
                @for($i = 0;$i < sizeof($tour_packages);$i++)
                    <div class="col-lg-4 col-md-4 col-sm-6" >
                        <div class="card rounded" style="min-height: 600px;max-height: 720px;margin-bottom:10px;border-radius: 5%;">
                            <img class="img-responsive" src="{{ $tour_packages[$i]->image }}" alt="">
                            <div class="blog-text">
                                <div class="card-body">
                                    <h3 class="card-title"> {{ $tour_packages[$i]->name }} 
                                    @if($tour_packages[$i]->id_ticket != NULL)
                                        <span class="badge badge-success text-white" style="background-color:#38c172;border-radius: 0.25rem;">Discount {{ $tour_packages[$i]->discount }}%</span> 
                                    @endif 
                                    </h3>   
                                    <span style="font-size:16px;">{{ $tour_packages[$i]->count_day }} Days {{ $tour_packages[$i]->count_day - 1}} Nights + {{ $tour_packages[$i]->count_hotel}} Hotels</span>
                                    <br>
                                    <br>
                                    <span style="font-size:16px;">{{ $tour_packages[$i]->count_destination }} Destinations + {{ $tour_packages[$i]->count_restaurant }} Restaurants</span>
                                    <br>
                                    <br>
								    <span style="font-size:16px;">Rp{{ $tour_packages[$i]->price_discount }}/pax</span>
                                    <!-- <p><a href="{{ route('user_package.order', $tour_packages[$i]->id) }}">Learn More...</a></p> -->
                                    <p><a href="{{ route('tour_package.info', $tour_packages[$i]->id) }}">Learn More...</a></p>
                                </div>
                            </div> 
                        </div>
                    </div>
                @endfor
                <div>
                    {{ $tour_packages->links() }}
                </div>
            </div>
            

        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
