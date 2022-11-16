@extends('layouts.sidebar')

@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update User</h1>
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
            <form method="POST" action="{{ route('user.update', $user->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="card-header bg-primary">
                <h3 class="card-title">Data User</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Nama*</label>

                  <div class="col-md-6">
                      <input  id="name" 
                              type="text" 
                              class="form-control @error('name') is-invalid @enderror" 
                              name="name" 
                              value="{{ old('name') ?? $user->name }}" 
                              autocomplete="name" 
                              placeholder="name"
                              autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">Email*</label>

                  <div class="col-md-6">
                      <input  id="email" 
                              type="text" 
                              class="form-control @error('email') is-invalid @enderror" 
                              name="email" 
                              value="{{ old('email') ?? $user->email}}"
                              autocomplete="email" 
                              placeholder="email"
                              autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="handphone" class="col-md-4 col-form-label text-md-right">No Hp*</label>

                  <div class="col-md-6">
                      <input  id="handphone" 
                              type="tel" 
                              class="form-control @error('handphone') is-invalid @enderror" 
                              name="handphone" 
                              value="{{ old('handphone') ?? $user->handphone}}"
                              autocomplete="handphone" 
                              placeholder="handphone"
                              autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="status" class="col-md-4 col-form-label text-md-right">Status*</label>

                  <div class="col-md-6">
                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status')}}" autocomplete="status" autofocus>
                      <option selected disabled>Status</option>
                      <option value="active">Active</option>
                      <option value="banned">Banned</option>
                    </select> 
                  </div>
                </div>

                <div class="col-md-4 text-md-right font-weight-bold">
                  <span ><sup>(*)</sup>Wajib diisi</span>
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