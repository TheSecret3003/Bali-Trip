@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Form Pembuatan Paket</h1>
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
              <h3 class="card-title">Buat Paket</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- form start -->
              <form method="POST" action="{{ route('package.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Paket*</label>

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
                    <label for="ticket_code" class="col-md-4 col-form-label text-md-right">Kode Tiket</label>

                    <div class="col-md-6">
                      <select id="ticket_code" class="form-control @error('ticket_code') is-invalid @enderror" name="ticket_code" value="{{ old('ticket_code')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Kode Tiket</option>
                        @foreach($ticket as $tick)
                          <option value="{{ $tick->id}}">{{ $tick->ticket_code}}</option>
                        @endforeach
                      </select> 

                        @error('ticket_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination1" class="col-md-4 col-form-label text-md-right">Destinasi 1*</label>

                    <div class="col-md-6">
                      <select id="destination1" class="form-control @error('destination1') is-invalid @enderror" name="destination1" value="{{ old('destination1')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Destinasi 1</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination2" class="col-md-4 col-form-label text-md-right">Destinasi 2</label>

                    <div class="col-md-6">
                      <select id="destination2" class="form-control @error('destination2') is-invalid @enderror" name="destination2" value="{{ old('destination2')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Destinasi 2</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination3" class="col-md-4 col-form-label text-md-right">Destinasi 3</label>

                    <div class="col-md-6">
                      <select id="destination3" class="form-control @error('destination3') is-invalid @enderror" name="destination3" value="{{ old('destination3')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Destinasi 3</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination4" class="col-md-4 col-form-label text-md-right">Destinasi 4</label>

                    <div class="col-md-6">
                      <select id="destination4" class="form-control @error('destination4') is-invalid @enderror" name="destination4" value="{{ old('destination4')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Destinasi 4</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination5" class="col-md-4 col-form-label text-md-right">Destinasi 5</label>

                    <div class="col-md-6">
                      <select id="destination5" class="form-control @error('destination5') is-invalid @enderror" name="destination5" value="{{ old('destination5')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Destinasi 5</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination6" class="col-md-4 col-form-label text-md-right">Destinasi 6</label>

                    <div class="col-md-6">
                      <select id="destination6" class="form-control @error('destination6') is-invalid @enderror" name="destination6" value="{{ old('destination6')}}" autocomplete="destination6" autofocus>
                        <option selected disabled>Destinasi 6</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination6')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination7" class="col-md-4 col-form-label text-md-right">Destinasi 7</label>

                    <div class="col-md-6">
                      <select id="destination7" class="form-control @error('destination7') is-invalid @enderror" name="destination7" value="{{ old('destination7')}}" autocomplete="destination7" autofocus>
                        <option selected disabled>Destinasi 7</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination7')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination8" class="col-md-4 col-form-label text-md-right">Destinasi 8</label>

                    <div class="col-md-6">
                      <select id="destination8" class="form-control @error('destination8') is-invalid @enderror" name="destination8" value="{{ old('destination8')}}" autocomplete="destination8" autofocus>
                        <option selected disabled>Destinasi 8</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination8')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination9" class="col-md-4 col-form-label text-md-right">Destinasi 9</label>

                    <div class="col-md-6">
                      <select id="destination9" class="form-control @error('destination9') is-invalid @enderror" name="destination9" value="{{ old('destination9')}}" autocomplete="destination9" autofocus>
                        <option selected disabled>Destinasi 9</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination9')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="destination10" class="col-md-4 col-form-label text-md-right">Destinasi 10</label>

                    <div class="col-md-6">
                      <select id="destination10" class="form-control @error('destination10') is-invalid @enderror" name="destination10" value="{{ old('destination10')}}" autocomplete="destination10" autofocus>
                        <option selected disabled>Destinasi 10</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}">{{ $dest->name}}</option>
                        @endforeach
                      </select>

                        @error('destination10')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="restaurant1" class="col-md-4 col-form-label text-md-right">Restoran 1</label>

                    <div class="col-md-6">
                      <select id="restaurant1" class="form-control @error('restaurant1') is-invalid @enderror" name="restaurant1" value="{{ old('restaurant1')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Restoran 1</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}">{{ $rest->name}}</option>
                        @endforeach
                      </select>

                        @error('restaurant1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="restaurant2" class="col-md-4 col-form-label text-md-right">Restoran 2</label>

                    <div class="col-md-6">
                      <select id="restaurant2" class="form-control @error('restaurant2') is-invalid @enderror" name="restaurant2" value="{{ old('restaurant2')}}" autocomplete="tiket_code" autofocus>
                        <option selected disabled>Restoran 2</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}">{{ $rest->name}}</option>
                        @endforeach
                      </select>

                        @error('restaurant2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="restaurant3" class="col-md-4 col-form-label text-md-right">Restoran 3</label>

                    <div class="col-md-6">
                      <select id="restaurant3" class="form-control @error('restaurant3') is-invalid @enderror" name="restaurant3" value="{{ old('restaurant3')}}" autocomplete="restaurant3" autofocus>
                        <option selected disabled>Restoran 3</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}">{{ $rest->name}}</option>
                        @endforeach
                      </select>

                        @error('restaurant3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="restaurant4" class="col-md-4 col-form-label text-md-right">Restoran 4</label>

                    <div class="col-md-6">
                      <select id="restaurant4" class="form-control @error('restaurant4') is-invalid @enderror" name="restaurant4" value="{{ old('restaurant4')}}" autocomplete="restaurant4" autofocus>
                        <option selected disabled>Restoran 4</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}">{{ $rest->name}}</option>
                        @endforeach
                      </select>

                        @error('restaurant4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="schedule" class="col-md-4 col-form-label text-md-right">Jadwal*</label>

                    <div class="col-md-6">
                        <input id="schedule" type="text" class="form-control @error('schedule') is-invalid @enderror" name="schedule" autocomplete="new-schedule">

                        @error('schedule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Harga*</label>

                    <div class="col-md-6">
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="new-price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="special_price" class="col-md-4 col-form-label text-md-right">Harga Spesial</label>

                    <div class="col-md-6">
                        <input id="special_price" type="number" class="form-control @error('special_price') is-invalid @enderror" name="special_price" autocomplete="new-special_price">

                        @error('special_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                    <div class="col-md-6">
                        <textarea rows="6" input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="new-description"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keterangan" class="col-md-4 col-form-label text-md-right">Keterangan</label>

                    <div class="col-md-6">
                        <textarea rows="2" input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" autocomplete="new-keterangan"></textarea>

                        @error('keterangan')
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