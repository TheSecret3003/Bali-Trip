@extends('layouts.sidebar')

@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Hotel</h1>
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
            <form method="POST" action="{{ route('hotel.update', $hotel->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="card-header bg-primary">
                <h3 class="card-title">Data Hotel</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nama*</label>

                  <div class="col-md-6">
                      <input  id="name" 
                              type="text" 
                              class="form-control @error('name') is-invalid @enderror" 
                              name="name" 
                              value="{{ old('name') ?? $hotel->name }}" 
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
                      <textarea rows="6" input  id="description" 
                              type="text" 
                              class="form-control @error('description') is-invalid @enderror" 
                              name="description" 
                              value="{{ old('description') ?? $hotel->description}}"
                              autocomplete="description" 
                              placeholder="description"
                              autofocus></textarea>

                      @error('description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">Gambar Hotel*</label>

                  <div class="col-md-6">
                      <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="" autocomplete="image" autofocus>
                      <a href="{{ $hotel->image() }}">{{ ($hotel->image)?'Last uploaded image':'' }}</a>
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
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection