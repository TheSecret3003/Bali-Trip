@extends('layouts.navbar_1')

@section('main')
<div class="main">
    <div id="fh5co-tours" style="padding-bottom:0;">
        <div class="tours-cars" style="margin:0 12vw 0 6vw;">
                <div class="row">
                    <div class="col-md-12 text-center heading-section animate-box title">
                        <h3>Account Setting</h3>
                    </div>
                </div>

                <div class="header-nav"> 
                    <ul class="nav nav-tabs mt-4" role="tablist" id="tab_list">
                        <li class="nav-item text-center col-md-2 {{ (request()->route()->getName()=='profile')?'active':''}}">
                            <a class="nav-link " href="{{ url('/home/profile') }}" style="height: 2vh;">
                                General Setting
                            </a>
                        </li>
                        <li class="nav-item text-center col-md-2 {{ (request()->route()->getName()=='profile.list')?'active':'' }}">
                            <a class="nav-link " href="{{ url('/home/profile/list') }}">
                                Order & Review
                            </a>
                        </li>
                        <li class="nav-item text-center col-md-2 {{ (request()->route()->getName()=='profile.list_car')?'active':'' }}">
                            <a class="nav-link " href="{{ url('/home/profile/list_car') }}">
                                Car Order
                            </a>
                        </li>
                    </ul>

                    <button class="btn btn-danger btn-logout" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="margin-left:3vw;height:6vh;width:8vw !important;">Logout</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>

                <form method="POST" action="{{ route('profile.update')}}" enctype="multipart/form-data">
            @csrf
                <div class="row" style="margin-bottom:5vh;">
                    <div class="col-md-6">
                        <div class="card box-profile">
                            <div class="card-body">
                                <h5 class="card-title profile-title">Profile Details</h5>

                                <div class="form-group row profile-group">
                                    <div for="name" class="col-md-12 text-left profile-text">Name</div>

                                    <div class="col-md-12">
                                        <input 
                                        id="name"
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror profile-form" 
                                        name="name" 
                                        value="{{ old('name') ?? Auth::user()->name }}" 
                                        autocomplete="name" 
                                        autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row profile-group">
                                    <div for="email" class="col-md-12 text-left profile-text">Email</div>

                                    <div class="col-md-12">
                                        <input 
                                        id="email"
                                        type="text" 
                                        class="form-control @error('email') is-invalid @enderror profile-form" 
                                        name="email" 
                                        value="{{ old('email') ?? Auth::user()->email }}" 
                                        autocomplete="email" 
                                        autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row profile-group">
                                    <div for="handphone" class="col-md-12 text-left profile-text">Phone Number</div>

                                    <div class="col-md-12">
                                        <input 
                                        id="handphone"
                                        type="text" 
                                        class="form-control @error('handphone') is-invalid @enderror profile-form" 
                                        name="handphone" 
                                        value="{{ old('handphone') ?? Auth::user()->handphone }}" 
                                        autocomplete="handphone" 
                                        autofocus>

                                        @error('handphone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card box-profile">
                            <div class="card-body">
                                <h5 class="card-title profile-title">Change Password</h5>

                                <div class="form-group row profile-group">
                                    <div for="password" class="col-md-12 text-left profile-text">Old Password</div>

                                    <div class="col-md-12">
                                        <div class="input-group profile-form">
                                            <input 
                                            id="password"
                                            type="password" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="old_password" 
                                            value="{{ old('password')}}" 
                                            autocomplete="password" 
                                            autofocus style="border-style: none none none none; border-radius: 10px !important; background-color: #C6F9FC !important;">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="border-style: none none none none;border-radius: 10px !important; background-color: #C6F9FC !important;" onclick="password_show_hide();">
                                                    <i class="fas fa-eye-slash" id="show_eye"></i>
                                                    <i class="fas fa-eye d-none" id="hide_eye"></i>
                                                </span>
                                            </div>
                                        </div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row profile-group">
                                    <div for="password" class="col-md-12 text-left profile-text">New Password</div>

                                    <div class="col-md-12">
                                        <div class="input-group profile-form">
                                            <input 
                                            id="new_password"
                                            type="password" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="new_password" 
                                            value="{{ old('password')}}" 
                                            autocomplete="password" 
                                            autofocus style="border-style: none none none none; border-radius: 10px !important; background-color: #C6F9FC !important;">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="border-style: none none none none; border-radius: 10px !important; background-color: #C6F9FC !important;" onclick="password_show_hide_1();">
                                                    <i class="fas fa-eye-slash" id="show_eye_1"></i>
                                                    <i class="fas fa-eye d-none" id="hide_eye_1"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row profile-group">
                                    <div for="password" class="col-md-12 text-left profile-text">Confirm New Password</div>

                                    <div class="col-md-12">
                                        <div class="input-group profile-form">
                                            <input 
                                            id="new_confirm_password"
                                            type="password" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="new_confirm_password" 
                                            value="{{ old('password')}}" 
                                            autocomplete="password" 
                                            autofocus style="border-style: none none none none; border-radius: 10px !important; background-color: #C6F9FC !important;">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="border-style: none none none none; border-radius: 10px !important; background-color: #C6F9FC !important;" onclick="password_show_hide_2();">
                                                    <i class="fas fa-eye-slash" id="show_eye_2"></i>
                                                    <i class="fas fa-eye d-none" id="hide_eye_2"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6 mx-auto">
                        <div class="card box-profile">
                            <div class="card-body">
                                <h5 class="card-title profile-title text-center">Delete Account</h5>
                                <div class="col-md-12 text-left profile-text text-center" style="margin-left:0 !important;">
                                By Clicking “Delete Account”, You’ll Permanently Remove Your Account From This Site.
                                </div>
                                <div class="row" >
                                    <button class="btn btn-success profile-button mx-auto delete-account">Delete Account</button>
                                </div>
                            </div>    
                        </div>
                    </div>
                    
                </div>
                
                <div class="form-group text-center" style="margin-top:8vh;">
                    <button class="btn btn-primary text-white col-md-6 text-button">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).on('click', '.logout-button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: "Are you sure want to logout?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
  if (willDelete) {
            window.location = "/logout";
        } 
    });
});
</script>
<script type="text/javascript">
$(document).on('click', '.delete-account', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: "Are you sure want to delete your account?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
  if (willDelete) {
            window.location = "/home/profile/delete";
        } 
    });
});
</script>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hide_1() {
        var x = document.getElementById("new_password");
        var show_eye = document.getElementById("show_eye_1");
        var hide_eye = document.getElementById("hide_eye_1");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hide_2() {
        var x = document.getElementById("new_confirm_password");
        var show_eye = document.getElementById("show_eye_2");
        var hide_eye = document.getElementById("hide_eye_2");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

@endsection