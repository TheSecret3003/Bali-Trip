@extends('layouts.navbar')

@section('main')
<div class="main">
  <div class="container_12">
    <div class="grid_12">
      <div class="slider-relative">
        <div class="slider-block">
          <div class="slider"> <a href="#" class="prev"></a><a href="#" class="next"></a>
            <ul class="items">
            
              <li><img src="{{ asset ("img/slide.jpg") }}" alt="">
                <div class="banner">
                  <div>THERE ARE PLENTY OF PLACES</div>
                  <br>
                  <span> that are worth seeing</span> </div>
              </li>
              <li><img src="{{ asset ("img/slide1.jpg") }}" alt=""></li>
              <li><img src="{{ asset ("img/slide2.jpg") }}" alt=""></li>
              <li><img src="{{ asset ("img/slide3.jpg") }}" alt=""></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container_12">
      <div class="grid_12">
        <h3>Top Tours</h3>
      </div>
      <div class="boxes">
        <div class="grid_4">
          <figure>
            <div><img src="{{ $packages[0]->image }}" alt=""></div>
            <figcaption>
              <h4>{{ $packages[0]->name }}</h4>
              <p style="text-align:justify;">
                {{ $packages[0]->description }}
              </p>
              <a href="#" class="btn">Details</a> </figcaption>
          </figure>
        </div>
        <div class="grid_4">
          <figure>
            <div><img src="{{ $packages[1]->image }}" alt=""></div>
            <figcaption>
              <h4>{{ $packages[1]->name }}</h4>
              <p style="text-align:justify;">
                {{ $packages[1]->description }}
              </p>
              <a href="#" class="btn">Details</a> </figcaption>
          </figure>
        </div>
        <div class="grid_4">
          <figure>
            <div><img src="{{ $packages[2]->image }}" alt=""></div>
            <figcaption>
              <h4>{{ $packages[2]->name }}</h4>
              <p style="text-align:justify;">
                {{ $packages[2]->description }}
              </p>
              <a href="#" class="btn">Details</a> </figcaption>
          </figure>
        </div>
        <div class="clear"></div>
      </div>
      <div class="grid_12">
        <div id="tabs">
          <ul>
            <li><a href="#tabs-1">Optional Tour</a></li>
            <li><a href="#tabs-2">Pacakge Tour</a></li>
            <li><a href="#tabs-3">Rent Car</a></li>
          </ul>
          <div class="clear"></div>
          <div class="tab_cont" id="tabs-1"> 
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $optional_packages[0]->image }}" alt="{{ $optional_packages[0]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $optional_packages[0]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $optional_packages[0]->description }} </p>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Information: </span><br>{{ $optional_packages[0]->keterangan }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
            <div class="clear cl1"></div>
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $optional_packages[1]->image }}" alt="{{ $optional_packages[1]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $optional_packages[1]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $optional_packages[1]->description }} </p>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Information: </span><br>{{ $optional_packages[1]->keterangan }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
            <div class="clear cl1"></div>
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $optional_packages[2]->image }}" alt="{{ $optional_packages[2]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $optional_packages[2]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $optional_packages[2]->description }} </p>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Information: </span><br>{{ $optional_packages[2]->keterangan }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
          </div>
          <div class="tab_cont" id="tabs-2">
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $tour_packages[0]->image }}" alt="{{ $tour_packages[0]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $tour_packages[0]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $tour_packages[0]->description }} </p>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Information: </span><br>{{ $tour_packages[0]->keterangan }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
            <div class="clear cl1"></div>
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $tour_packages[1]->image }}" alt="{{ $tour_packages[1]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $tour_packages[1]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $tour_packages[1]->description }} </p>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Information: </span><br>{{ $tour_packages[1]->keterangan }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
            <div class="clear cl1"></div>
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $tour_packages[2]->image }}" alt="{{ $tour_packages[2]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $tour_packages[2]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $tour_packages[2]->description }} </p>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Information: </span><br>{{ $tour_packages[2]->keterangan }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
          </div>
          <div class="tab_cont" id="tabs-3">
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $cars[0]->image() }}" alt="{{ $cars[0]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $cars[0]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $cars[0]->description }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
            <div class="clear cl1"></div>
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $cars[1]->image() }}" alt="{{ $cars[1]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $cars[1]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $cars[1]->description }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
            <div class="clear cl1"></div>
            <div>
              <img style="width: 250px;length: 250px;" src="{{ $cars[2]->image() }}" alt="{{ $cars[2]->name }}">
              <div class="extra_wrapper">
                <div class="text1">{{ $cars[2]->name }} </div>
                <p class="style1" style="text-align:justify;"><span style="color: #1a9bc3; font-size: 15px;">Description: </span><br>{{ $cars[2]->description }} </p>
                <a href="#" class="btn">Details</a>
                <div class="clear "></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="bottom_block">
    <div class="container_12">
      <div class="grid_8">
        <h4>About Us:</h4>
        <p>
            Bali Tours is local company from bali. We are proud to offer to you to many kind of variety tour and we have a reliable driver from Bali who is professional, responsible and friendly. for make your memories unforgettable in bali.
        </p>
      </div>
      <div class="grid_4">
        <h4>Contact Us:</h4>
        <div >
            <i class='fas fa-map-marker-alt'></i>
            <span>Abiansemal, Kab. Badung, Bali 80352 </span>
        </div>
        <div>
            <i class="fa fa-envelope" ></i>
            <span >balitours@gmail.com </span>
        </div>
        <div >
            <i class="fa fa-phone" ></i>
            <span >+6283117580889 </span>
        </div>
        <div >
          <i class="fab fa-facebook-f"></i>
            <span >balitours </span>
        </div>
        </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
    $(window).load(function () {
        $('.slider')._TMS({
            show: 0,
            pauseOnHover: false,
            prevBu: '.prev',
            nextBu: '.next',
            playBu: false,
            duration: 800,
            preset: 'random',
            pagination: true, //'.pagination',true,'<ul></ul>'
            pagNums: false,
            slideshow: 8000,
            numStatus: false,
            banners: true,
            waitBannerAnimation: false,
            progressBar: false
        });
        $("#tabs").tabs();
        $().UItoTop({
            easingType: 'easeOutQuart'
        });
    });
    </script>
@endsection