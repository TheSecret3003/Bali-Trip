@extends('layouts.navbar_2')

@section('main')
<div class="main" >
    <div id="fh5co-car" class="fh5co-section-gray">
        <div class="tours-cars">
            <div class="row">
                <div class="col-md-12 text-center heading-section animate-box" style="margin-top:50px;margin-bottom:80px;">
                    <h3>Cars Rent</h3>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
            @if(Session::has('message_sent'))
                <div class="alert alert-success">
                    <h3>{{ Session::get('message_sent') }}</h3>
                </div>
            @endif
                @foreach($cars as $car)
                    <div class="col-md-6 animate-box">
                        <div class="car" style="min-height: 42rem;max-height: 48rem;border-radius:15px !important;">
                            <div class="one-4" >
                                <h3 style="font-family: 'Open Sans';
font-style: normal;
font-weight: 700;
font-size: 28px;">{{$car->name}}</h3>
                                <br>
                                <p style="text-align:justify;color:white;font-family: 'Open Sans';white-space: pre-line;"><small> {{ $car->description }}</small></p>
                                <br>
                                
                                <span style="font-size:14px;"><i class="fa fa-user" aria-hidden="true" style="margin-right:1vw;"></i>{{$car->max_person}} Persons Max</span>
                                <span style="font-size:14px;"><i class="fas fa-clock" aria-hidden="true" style="margin-right:1vw;"></i>Duration: {{$car->hours}} hours</span>
                                <br>
                                <br>
                                <span style="font-family: 'Open Sans';
font-style: normal;
font-weight: 700;
font-size: 22px;
line-height: 38px;">Rp.{{number_format($car->price)}}</span>
                                <br>
                                <button class="btn btn-car-order col-md-4 text-center text-white">
                                    <a href="{{ route('user_car.order', $car->id) }}" class="text-white text-center text-car">Order</a>
                                </button> 
                            </div>
                            <div class="one-1" style="background-image: url({{$car->image()}});border-top-right-radius:15px;border-bottom-right-radius:15px;">
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
