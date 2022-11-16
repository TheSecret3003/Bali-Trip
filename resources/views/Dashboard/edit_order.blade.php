@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Pesanan</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header bg-primary">
                    <h3 class="card-title">Data Pesanan</h3>
            </div>
            <div class="card-body">
              
              <!-- form start -->
              <form method="POST" action="{{ route('dashboard.update', $order->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="package" class="col-md-4 col-form-label text-md-right">Paket*</label>

                    <div class="col-md-6">
                      <select id="package" class="form-control @error('package') is-invalid @enderror" name="package" value="{{ old('package')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>{{ $order->package }}</option>
                        @foreach($packages as $package)
                          <option value="{{ $package->id}}" {{ ($package->name == $order->package)?'selected':'' }}>{{ $package->name}}</option>
                        @endforeach
                      </select>

                        @error('package')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">Status*</label>

                    <div class="col-md-6">
                      <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $order->pick_point }}" autocomplete="pick_point" autofocus>
                        <option selected disabled>{{ $order->status }}</option>
                        <option value="delivered">delivered</option>
                        <option value="success">success</option>
                        <option value="pending">pending</option>
                        <option value="canceled ">canceled</option>
                      </select> 

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="regency" class="col-md-4 col-form-label text-md-right">Regency/Kabupaten</label>

                    <div class="col-md-6">
                      <select id="regency" class="form-control @error('regency') is-invalid @enderror" name="regency" value="{{ old('regency')}}" autocomplete="tiket_code" autofocus>
                        @if($order->regency_name != NULL)
                          <option selected disabled>{{$order->regency_name}}</option>
                        @else
                          <option selected>---Regency/Kabupaten---</option>
                        @endif
                        @foreach($regencies as $regency)
                          <option value="{{ $regency->id}}" {{ ($regency->name == $order->regency_name)?'selected':'' }} > {{ $regency->name}}</option>
                        @endforeach
                        
                          
                      </select>

                        @error('regency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="district" class="col-md-4 col-form-label text-md-right">District/Kecamatan</label>

                    <div class="col-md-6">
                      <select id="district" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district')}}" autocomplete="tiket_code" autofocus>
                        <option selected>{{ ($order->district_name != NULL)?$order->district_name:'---District/Kecamatan---' }}</option>
                        @if($districts != NULL)
                          @foreach($districts as $district)
                            <option value="{{ $district->id}}" {{ ($district->name == $order->district)?'selected':'' }}>{{ $district->name}}</option>
                          @endforeach
                        @endif
                      </select>

                        @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="village" class="col-md-4 col-form-label text-md-right">Desa/Village</label>

                    <div class="col-md-6">
                      <select id="village" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village')}}" autocomplete="tiket_code" autofocus>
                        <option selected>{{ ($order->village_name != NULL)?$order->village_name:'---Village/Kecamatan---' }}</option>
                        @if($villages != NULL)
                          @foreach($villages as $village)
                            <option value="{{ $village->id}}" {{ ($village->name == $order->village)?'selected':'' }}>{{ $village->name}}</option>
                          @endforeach
                        @endif
                      </select>

                        @error('village')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

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
                  <label for="date" class="col-md-4 col-form-label text-md-right">Tanggal Keberangkatan</label>

                  <div class="col-md-6">
                    <date-picker
                            is-disable=""
                            is-test="false" 
                            id="date" 
                            type="date" 
                            name="date" 
                            autofocus></date-picker>
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">Bukti Bayar</label>

                  <div class="col-md-6">
                      <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="" autocomplete="image" autofocus>
                      <a href="{{ $order->image() }}">{{ ($order->image)?'Last uploaded image':'' }}</a>
                      @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="col-md-4 text-md-right font-weight-bold">
                  <span ><sup>(*)</sup>Wajib diisi</span>
                </div>

              <div class="card-footer" style="display: flex">
                <submit-button message="Simpan"></submit-button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('js')
<script>
   
   $('#regency').change(function(){
    var regency_id = $(this).val();    
    if(regency_id){
        $.ajax({
           type:"GET",
           url:"/get_districts?regency_id="+regency_id,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#district").empty();
                $("#village").empty();
                $("#district").append('<option>---District/Kecamatan---</option>');
                $("#village").append('<option>---Village/Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#district").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#district").empty();
               $("#village").empty();
            }
           }
        });
    }else{
        $("#district").empty();
        $("#village").empty();
    }      
   });
 
   $('#district').change(function(){
    var district_id = $(this).val();    
    if(district_id){
        $.ajax({
           type:"GET",
           url:"/get_villages?district_id="+district_id,
           dataType: 'JSON',
           success:function(res){             
            if(res){
                console.log(res);
                $("#village").empty();
                $("#village").append('<option selected>---Village/Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#village").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#village").empty();
            }
           }
        });
    }else{
        $("#village").empty();
    }      
   });
  
</script>

@endsection