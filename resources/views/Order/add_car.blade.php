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
              <h3 class="card-title">Buat Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- form start -->
              <form method="POST" action="{{ route('order.store_car') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="car" class="col-md-4 col-form-label text-md-right">Mobil*</label>

                    <div class="col-md-6">
                      <select id="car" class="form-control @error('car') is-invalid @enderror" name="car" value="{{ old('car')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Mobil</option>
                        @foreach($cars as $car)
                          <option value="{{ $car->id}}">{{ $car->name}}</option>
                        @endforeach
                      </select>

                        @error('car')
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
                    <label for="car_amount" class="col-md-4 col-form-label text-md-right">Jumlah Mobil*</label>

                    <div class="col-md-6">
                        <input id="car_amount" type="number" class="form-control @error('car_amount') is-invalid @enderror" name="car_amount" value="{{ old('car_amount') }}" autocomplete="car_amount" autofocus>

                        @error('car_amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="max_person" class="col-md-4 col-form-label text-md-right">Jumlah Penumpang*</label>

                    <div class="col-md-6">
                        <input id="max_person" type="number" class="form-control @error('max_person') is-invalid @enderror" name="max_person" value="{{ old('max_person') }}" autocomplete="max_person" autofocus>

                        @error('max_person')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                  <label for="date" class="col-md-4 col-form-label text-md-right">Tanggal Pengambilan*</label>

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
@endsection