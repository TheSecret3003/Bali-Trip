@extends('layouts.navbar')

@section('main')
<div class="main">
  <div class="content">
    <div class="container_12">
      <div class="grid_9">
        <h3>Stay in Touch</h3>
        <div class="map">
          <figure class="img_inner fleft grid_9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.566576119452!2d115.08234701415851!3d-8.145527583830225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd19a9adb1d7f8d%3A0x7ac83c58f27b413e!2sBumdesa%20Bhuana%20Utama%20Panji!5e0!3m2!1sen!2sid!4v1664021347655!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="grid_8"></iframe>
          </figure>
        </div>
      </div>
      <div class="grid_3">
        <h3>Contact Us</h3>
        @if(Session::has('message_sent'))
            <div class="alert alert-success">
                {{ Session::get('message_sent') }}
            </div>
        @endif
        <form id="form" method="POST" action="{{ route('contact.email') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="tel" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Subject:</strong>
                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Message:</strong>
                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>  
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
      </div>    
    </div>
    <div class = "whatsapp-chat">
        <a href="https://wa.me/6287885818555?" target="_blank">
            <img src="{{ asset("img/WA.png") }}" height="80px" width="80px">
        </a>
    </div>
    <div class="clear"></div>
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
        $().UItoTop({
            easingType: 'easeOutQuart'
        });
    });
</script>

@endsection