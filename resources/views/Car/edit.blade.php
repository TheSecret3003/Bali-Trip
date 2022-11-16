@extends('layouts.sidebar')

@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Mobil</h1>
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
            <form method="POST" action="{{ route('car.update', $car->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="card-header bg-primary">
                <h3 class="card-title">Data Mobil</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nama*</label>

                  <div class="col-md-6">
                      <input  id="name" 
                              type="text" 
                              class="form-control @error('name') is-invalid @enderror" 
                              name="name" 
                              value="{{ old('name') ?? $car->name }}" 
                              autocomplete="name" 
                              placeholder="Nama Lengkap"
                              autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label text-md-right">Deskripsi*</label>

                  <div class="col-md-6">
                      <textarea rows="2" input  id="description" 
                              type="text" 
                              class="form-control @error('description') is-invalid @enderror" 
                              name="description" 
                              value="{{ old('description') ?? $car->description}}"
                              autocomplete="description" 
                              placeholder="description"
                              autofocus>{{ $car->description}}</textarea>

                      @error('description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">Gambar Mobil*</label>

                  <div class="col-md-6">
                      <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="" autocomplete="image" autofocus>
                      <a href="{{ $car->image() }}">{{ ($car->image)?'Last uploaded image':'' }}</a>
                      @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="max_person" class="col-md-4 col-form-label text-md-right">Maks. Penumpang*</label>

                  <div class="col-md-6">
                      <input  id="max_person" 
                              type="number" 
                              class="form-control @error('max_person') is-invalid @enderror" 
                              name="max_person" 
                              value="{{ old('max_person') ?? $car->max_person }}" 
                              autocomplete="max_person" 
                              placeholder="Penumpang"
                              autofocus>

                      @error('max_person')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="price" class="col-md-4 col-form-label text-md-right">Harga*</label>

                  <div class="col-md-6">
                      <input  id="price" 
                              type="text" 
                              class="form-control @error('price') is-invalid @enderror" 
                              name="price" 
                              value="{{ old('price') ?? $car->price }}" 
                              autocomplete="price" 
                              placeholder="Harga"
                              autofocus>

                      @error('price')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="hours" class="col-md-4 col-form-label text-md-right">Durasi (Jam)*</label>

                  <div class="col-md-6">
                      <input  id="hours" 
                              type="text" 
                              class="form-control @error('hours') is-invalid @enderror" 
                              name="hours" 
                              value="{{ old('hours') ?? $car->hours }}" 
                              autocomplete="hours" 
                              placeholder="Harga"
                              autofocus>

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
                
              <div class="card-footer" style="display: flex">
                <submit-button message="Simpan"></submit-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection