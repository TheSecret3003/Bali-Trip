<div class="row" style="margin-bottom:5vh;">
    <div class="col-lg-6">
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
    <div class="col-lg-6">
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
    <div class="col-lg-6 mx-auto">
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