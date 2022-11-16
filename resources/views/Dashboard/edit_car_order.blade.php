@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Pesanan Mobil</h1>
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
                    <h3 class="card-title">Data Pesanan Mobil</h3>
            </div>
            <div class="card-body">
              
              <!-- form start -->
              <form method="POST" action="{{ route('dashboard.update_car_order', $car_order->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="car" class="col-md-4 col-form-label text-md-right">Mobil*</label>

                    <div class="col-md-6">
                      <select id="car" class="form-control @error('car') is-invalid @enderror" name="car" value="{{ old('car')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>{{ $car_order->car}}</option>
                        @foreach($cars as $car)
                          <option value="{{ $car->id}}" {{ ($car->name == $car_order->car)?'selected':'' }}>{{ $car->name}}</option>
                        @endforeach
                      </select>

                        @error('car')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">Status*</label>

                    <div class="col-md-6">
                      <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $car_order->pick_point }}" autocomplete="pick_point" autofocus>
                        <option selected disabled>{{ $car_order->status }}</option>
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
                  <label for="image" class="col-md-4 col-form-label text-md-right">Bukti Bayar</label>

                  <div class="col-md-6">
                      <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="" autocomplete="image" autofocus>
                      <a href="{{ $car_order->image() }}">{{ ($car_order->image)?'Last uploaded image':'' }}</a>
                      @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rental_date" class="col-md-4 col-form-label text-md-right">Tanggal Pengambilan</label>

                  <div class="col-md-6">
                    <date-picker
                            is-disable=""
                            is-test="false" 
                            id="rental_date" 
                            type="rental_date" 
                            name="rental_date"  
                            autofocus></date-picker>
                    @error('rental_date')
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