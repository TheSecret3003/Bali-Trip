@extends('layouts.navbar_1')

@section('main')
<div class="main">
  <div class="content_special">
    <div class="container_12_special">
    
        <div class="sidebar">
            <div class="profile">
                <img src="{{ asset ("img/user.jpg") }}" alt="profile_picture">
                <h3>{{ Auth::user()->name }}</h3>   
            </div>
            <ul>
                <li >
                    <a href="{{ url('/home/profile')}}" class="{{ (request()->route()->getName()=='profile')?'active':''}}">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Information</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/home/profile/list')}}">
                        <span class="icon"><i class="fa fa-comments"></i></span>
                        <span class="item">Order and Review</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/home/profile/list_car')}}" class="{{ (request()->route()->getName()=='profile.list_car')?'active':''}}">
                        <span class="icon"><i class="fas fa-bus"></i></span>
                        <span class="item">Car Order</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/home/profile/edit') }}" class="{{ (request()->route()->getName()=='profile.edit')?'active':''}}">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Edit Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Log Out</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="grid_9" style="width:900px;">
        
            <section class="content">
                <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('profile.update')}}" enctype="multipart/form-data">
                        @csrf
                        <h3 class="card-title" style="font-size:24px;margin-top:20px;">User Data</h3>
                        
                        <div class="card-body">
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-size:16px;">Name*</label>

                            <div class="col-md-6">
                                <input  
                                    id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror profile-placeholder" 
                                    name="name" 
                                    value="{{ old('name') ?? Auth::user()->name }}" 
                                    autocomplete="name" 
                                    placeholder="name"
                                    autofocus
                                >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size:16px;">Email*</label>

                            <div class="col-md-6">
                                <input  id="email" 
                                        type="text" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        name="email" 
                                        value="{{ old('email') ?? Auth::user()->email}}"
                                        autocomplete="email" 
                                        placeholder="email"
                                        autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="handphone" class="col-md-4 col-form-label text-md-right" style="font-size:16px;">Handphone*</label>

                            <div class="col-md-6">
                                <input  id="handphone" 
                                        type="tel" 
                                        class="form-control @error('handphone') is-invalid @enderror" 
                                        name="handphone" 
                                        value="{{ old('handphone') ?? Auth::user()->handphone}}"
                                        autocomplete="handphone" 
                                        placeholder="handphone"
                                        autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div>
                                <div>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit"style="font-size:10px;">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group text-right" style="margin-bottom:0;font-size:18px;">
                        <a href="{{ route('profile.delete') }}"><button class="btn btn-danger btn-submit"style="font-size:10px;">Delete Profile</button></a>
                    </div>
                    </div>
                    
                </div>
                
                </div><!-- /.container-fluid -->
            </section>
        </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection