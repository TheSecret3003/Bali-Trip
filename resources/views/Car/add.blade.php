@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Form Penambahan Mobil</h1>
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
              <h3 class="card-title">Tambah Mobil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- form start -->
              <form method="POST" action="{{ route('car.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Mobil*</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Deskripsi*</label>

                    <div class="col-lg-6">
                    <textarea rows="2" input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="new-description"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">Gambar*</label>

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
                    <label for="max_person" class="col-md-4 col-form-label text-md-right">Maks. Penumpang*</label>

                    <div class="col-lg-6">
                    <input input id="max_person" type="number" class="form-control @error('max_person') is-invalid @enderror" name="max_person" autocomplete="new-max_person">

                        @error('max_person')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Harga*</label>

                    <div class="col-lg-6">
                    <input input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="new-price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hours" class="col-md-4 col-form-label text-md-right">Durasi (Jam)*</label>

                    <div class="col-lg-6">
                    <input input id="hours" type="number" class="form-control @error('hours') is-invalid @enderror" name="hours" autocomplete="new-hours">

                        @error('hours')
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