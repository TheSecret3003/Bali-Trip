@extends('layouts.sidebar')

@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Tiket</h1>
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
            <form method="POST" action="{{ route('ticket.update', $ticket->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="card-header bg-primary">
                <h3 class="card-title">Data Tiket</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="ticket_code" class="col-md-4 col-form-label text-md-right">Kode*</label>

                  <div class="col-md-6">
                      <input  id="ticket_code" 
                              type="text" 
                              class="form-control @error('ticket_code') is-invalid @enderror" 
                              name="ticket_code" 
                              value="{{ old('ticket_code') ?? $ticket->ticket_code }}" 
                              autocomplete="ticket_code" 
                              placeholder="ticket_code"
                              autofocus>

                      @error('ticket_code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="discount" class="col-md-4 col-form-label text-md-right">Diskon(%)*</label>

                  <div class="col-md-6">
                      <input  id="discount" 
                              type="number" 
                              class="form-control @error('discount') is-invalid @enderror" 
                              name="discount" 
                              value="{{ old('discount') ?? $ticket->discount}}"
                              autocomplete="discount" 
                              placeholder="discount"
                              autofocus>

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