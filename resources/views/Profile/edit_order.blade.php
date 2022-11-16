@extends('layouts.navbar')

@section('main')
<div class="main">
  <div class="content_special">
    <div class="container_12_special">
    
        <div class="sidebar">
            <div class="profile">
                <img src="{{ asset ("img/user.jpg") }}" alt="profile_picture">
                <h3>{{ Auth::user()->name }}</h3>
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
                        <a href="{{ url('/home/profile/edit')}}" class="{{ (request()->route()->getName()=='profile.edit')?'active':''}}">
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
        </div>
        <div class="grid_9" style="width:900px;">
        
            <section class="content">
                <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('profile.update_order',$order->id) }}" enctype="multipart/form-data">
                        @csrf
                        <h3 class="card-title">User Data</h3>
                        
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label for="pick_point" class="col-md-4 col-form-label text-md-right">Titik Penjemputan*</label>

                                <div class="col-md-6">
                                    <input id="pick_point" type="text" class="form-control @error('pick_point') is-invalid @enderror" name="pick_point" value="{{ $order->pick_point }}" autocomplete="pick_point" autofocus>

                                    @error('pick_point')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Departure Date*</label>

                                <div class="col-md-6">
                                    <input
                                    placeholder="Date"
                                    type="text" 
                                    name="date"
                                    class="form-control datepicker"
                                    autofocus>
                                    @error('date')
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
                                <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div><!-- /.container-fluid -->
            </section>
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Bootstrap 4 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

    var datesForDisable = <?php echo $dates ?>;
    console.log(datesForDisable);

    $('.datepicker').datepicker({
        startDate: new Date(),
        format: 'mm-dd-yyyy',
        autoclose: true,
        todayHighlight: true,
        datesDisabled: datesForDisable
    });
</script>


@endsection