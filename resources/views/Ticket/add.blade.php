@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Form Penambahan Tiket</h1>
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
              <h3 class="card-title">Tambah Tiket</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- form start -->
              <form method="POST" action="{{ route('ticket.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="ticket_code" class="col-md-4 col-form-label text-md-right">Kode Tiket*</label>

                    <div class="col-md-6">
                        <input id="ticket_code" type="text" class="form-control @error('ticket_code') is-invalid @enderror" name="ticket_code" value="{{ old('ticket_code') }}" autocomplete="ticket_code" autofocus>

                        @error('ticket_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="discount" class="col-md-4 col-form-label text-md-right">Diskon(%)*</label>

                    <div class="col-lg-6">
                        <input id="discount" type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}" autocomplete="discount">

                        @error('discount')
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