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
                        <form method="POST" action="{{ route('profile.update_order',$order->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" style="margin-bottom:60px;">
                            <h3 class="card-title" style="font-size:24px;margin-top:20px;">Edit Order</h3>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label for="pick_point" class="col-md-4 col-form-label text-md-right" style="font-size:16px;">Titik Penjemputan*</label>

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
                                <label for="date" class="col-md-4 col-form-label text-md-right" style="font-size:16px;">Departure Date*</label>

                                <div class="col-md-6">
                                    <div class="input-group date datepicker" data-provide="datepicker" style="padding-left:0px;">
                                        <input type="text" name ="date" class="form-control @error('pick_point') is-invalid @enderror" style="height:28px;width:387px;padding-left:0px;">
                                        <div class="input-group-addon" style="display:flex;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
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