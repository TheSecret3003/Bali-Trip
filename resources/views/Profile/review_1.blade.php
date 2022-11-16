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
                            <a class="nav-link " href="{{ url('/home/profile') }}">
                                General Setting
                            </a>
                        </li>
                        <li class="nav-item text-center col-md-2 active">
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
                <form method="POST" action="{{ route('profile.update_order',$order->id)}}" enctype="multipart/form-data">
            @csrf
                <div class="row" style="margin-bottom:5vh;">
                    <div class="col-md-6">
                        <div class="card box-profile" style="min-height:30rem;">
                            <div class="card-body">
                                <h5 class="card-title profile-title">Review and Rating Order</h5>

                                <div class="form-group row profile-group">
                                    <div for="review" class="col-md-12 text-left profile-text">Review</div>

                                    <div class="col-md-12">
                                        <textarea 
                                        rows="4"
                                        id="review"
                                        type="text" 
                                        class="form-control @error('review') is-invalid @enderror profile-form" 
                                        name="review" 
                                        value="{{ old('review') ?? Auth::user()->review }}" 
                                        autocomplete="review" 
                                        autofocus></textarea>

                                        @error('review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rating" class="col-md-12 text-left profile-text">Rating</label>

                                    <div class="col-md-12" style="margin-left:2vw !important;padding:0;">
                                        <div class="rating">
                                            <input class="star star-5" value="5" id="star-5" type="radio" name="rating"/>
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-2" value="4" id="star-4" type="radio" name="rating"/>
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" value="3" id="star-3" type="radio" name="rating"/>
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" value="2" id="star-2" type="radio" name="rating"/>
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" value="1" id="star-1" type="radio" name="rating"/>
                                            <label class="star star-1" for="star-1"></label>
                                        </div>

                                        @error('rating')
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
                        <div class="card box-profile" style="min-height:30rem;">
                            <div class="card-body">
                                <h5 class="card-title profile-title">Edit Order</h5>

                                <div class="form-group row profile-group">
                                    <label for="pick_point" class="col-md-12 text-left profile-text">Pick Point/Titik Penjemputan</label>

                                    <div class="col-md-12">
                                        <input 
                                        id="pick_point" 
                                        type="text" 
                                        class="form-control @error('pick_point') is-invalid @enderror profile-form" 
                                        name="pick_point" value="{{ $order->pick_point }}"
                                         autocomplete="pick_point" 
                                         autofocus>

                                            @error('pick_point')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row profile-group">
                                    <label for="date" class="col-md-12 text-left profile-text">Departure Date</label>

                                    <div class="col-md-12">
                                        <input 
                                        id="date" 
                                        type="text" 
                                        class="form-control @error('date') is-invalid @enderror profile-form date datepicker" 
                                        name="date" value="{{ $order->departure_date }}"
                                        autocomplete="date" 
                                        data-provide="datepicker"
                                        autofocus>

                                            @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
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
<script>
    var datesForDisable = <?php echo $dates ?>;

    $('.datepicker').datepicker({
        startDate: new Date(),
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        datesDisabled: datesForDisable
    });
</script>
@endsection