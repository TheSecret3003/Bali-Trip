@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Form Pembuatan Pesanan</h1>
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
            <div class="card-header">
              <h3 class="card-title">Buat Pesanan Paket</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- form start -->
              <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="package" class="col-md-4 col-form-label text-md-right">Paket*</label>

                    <div class="col-md-6">
                      <select id="package" class="form-control @error('package') is-invalid @enderror" name="package" value="{{ old('package')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Paket</option>
                        @foreach($packages as $package)
                          <option value="{{ $package->id}}">{{ $package->name}}</option>
                        @endforeach
                      </select>

                        @error('package')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="payment_method" class="col-md-4 col-form-label text-md-right">Metode Pembayaran*</label>

                    <div class="col-md-6">
                      <select id="payment_method" class="form-control @error('payment_method') is-invalid @enderror" name="payment_method" value="{{ old('payment_method')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Metode Pembayaran</option>
                        <option value="gopay">GoPay</option>
                        <option value="ovo">Ovo</option>
                        <option value="bank">Transfer Bank</option>
                      </select> 

                        @error('payment_method')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> -->

                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">Bukti Bayar*</label>

                  <div class="col-md-6">
                      <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autocomplete="image" autofocus>
                      @error('image')
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
                        <option selected>---Regency/Kabupaten---</option>
                        @foreach($regencies as $regency)
                          <option value="{{ $regency->id}}">{{ $regency->name}}</option>
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
                        <option selected>---District/Kecamatan---</option>
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
                        <option selected>---Village/Desa---</option>
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
                        <input id="pick_point" type="text" class="form-control @error('pick_point') is-invalid @enderror" name="pick_point" value="{{ old('pick_point') }}" autocomplete="pick_point" autofocus>

                        @error('pick_point')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                  <label for="date" class="col-md-4 col-form-label text-md-right">Tanggal Keberangkatan*</label>

                  <div class="col-md-6">
                    <input
                      id="picker"
                      min = "{{date('Y-m-d')}}"
                      datesDisabled="{{date('Y-m-d')}}"
                      type="date" 
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

                <div class="col-md-4 text-md-right font-weight-bold">
                  <span ><sup>(*)</sup>Wajib diisi</span>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <submit-button message="Register"></submit-button>
                    </div>
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
<script type="text/javascript">
   
    $('.datepicker').datepicker({ 
        startDate: new Date()
    });
  
</script>
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
                $("#village").empty();
                $("#village").append('<option>---Village/Desa---</option>');
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