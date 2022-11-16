@extends('layouts.navbar_1')

@section('main')
<div class="main">
  <div class="content">
    <div class="container_12">
      <div class="grid_9">
        <div class="col-md-12 text-center heading-section animate-box" style="margin-top:150px;margin-bottom:40px;">
          <h3>Stay in Touch</h3>
        </div>
        <div class="map">
          <figure class="img_inner left grid_9">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.4691437459655!2d115.24046629999998!3d-8.6468513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f80ed7ccafb%3A0xb3b7a192bf1870b1!2sJl.%20Surabi%20II%20No.3%2C%20Kesiman%2C%20Kec.%20Denpasar%20Tim.%2C%20Kota%20Denpasar%2C%20Bali%2080237!5e0!3m2!1sen!2sid!4v1668433049406!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="grid_8"></iframe>
          </figure>
        </div>
      </div>
      <div class="grid_3">
        <div class="col-md-12 text-center heading-section animate-box" style="margin-top:150px;margin-bottom:40px;">
          <h3>Contact Us</h3>
        </div>
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
        <a href="https://wa.me/6287885818555?text=I'm%20interested%20to%20book%20tour%20package%20" target="_blank">
            <img src="{{ asset("img/WA.png") }}" height="80px" width="80px">
        </a>
    </div>
    <div class="clear"></div>
  </div>
</div>
@endsection