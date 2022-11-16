@extends('layouts.navbar')

@section('main')
<div class="main">
  <div class="content">
    <div class="container_12">
      <div class="grid_12">
        <h3>Our Gallery</h3>
      </div>
      <div class="gallery">
        @foreach($galleries as $gallery)
            <div class="grid_12" style="margin-bottom: 25px;display: flex; ">
            
                <a href="{{ $gallery->image() }}" class="gal img_inner" style="width: 350px;height:350px;margin-right: 50px;"><img src="{{ $gallery->image() }}" style="width: 350px;length: 350px;" src="{{ $gallery->image() }}" alt=""></a>
                 <div>
                    <div style="font-size:40px; line-height: normal;margin-bottom: 30px;">{{ $gallery->title }} </div>
                    <p style="text-align:justify; line-height: normal; font-size:20px;">{{ $gallery->description }} </p>
                </div> 
            </div>
        @endforeach 
        <div>
            {{ $galleries->links() }}
        </div>
         
      </div>   
      <div class="clear"></div>
    </div>
    
    
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/user/touchTouch.jquery.js') }}"></script>
<script>
    $(window).load(function () {
        $().UItoTop({
            easingType: 'easeOutQuart'
        });
    });
    $(function () {
        $('.gal').touchTouch();
    });
</script>

@endsection