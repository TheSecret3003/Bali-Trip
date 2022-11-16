@extends('layouts.navbar_1')

@section('main')
<div class="main">
  <div class="content">
    <div class="container_12">
      <div class="grid_12">
        <div class="col-md-12 text-center heading-section animate-box" style="margin-top:150px;margin-bottom:80px;">
          <h3>Our Gallery</h3>
        </div>
      </div>
      <div class="gallery">
        @foreach($galleries as $gallery)
            <div class="grid_4">
              <div class="card" style="height: 480px;margin-bottom:10px;border-radius: 5%;background-color:#bccfcd;">
                  <a href="{{ $gallery->image() }}" class="gal img_inner" style="border-top-left-radius: 5%;border-top-right-radius: 5%;">
                      <img style="width: 360px;border-top-left-radius: 5%;border-top-right-radius: 5%;" src="{{ $gallery->image() }}" >
                  </a>
                  <div class="card-body">
                    <h5 class="card-title" style="font-size:18px;">{{ $gallery->title }}</h5>
                    <p class="card-text" style="font-size:14px;">{{ $gallery->description }}</p>
                  </div>
              </div>
            </div>
        @endforeach 
         
      </div>   
      <div class="clear"></div>
      <div>
        </div>
    </div>
    
    
  </div>
</div>
@endsection

@section('js')
@endsection
