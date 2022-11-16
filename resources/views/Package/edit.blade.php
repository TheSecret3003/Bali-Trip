@extends('layouts.sidebar')

@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Paket Optional</h1>
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
            <form method="POST" action="{{ route('package.update', $package->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="card-header bg-primary">
                <h3 class="card-title">Data Paket</h3>
              </div>
              <div class="card-body">
              <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Paket*</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $package->name }}" autocomplete="name" autofocus>

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
                        <option selected disabled>{{ ($ticket_code != NULL)?$ticket_code->ticket_code:'Kode Tiket' }}</option>
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
                        <option selected disabled>{{ $destinations[0] }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ ($dest->name ==$destinations[0])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[1]))?$destinations[1]:'Destinasi 2' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[1]) && $dest->name ==$destinations[1])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[2]))?$destinations[2]:'Destinasi 3' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[2]) && $dest->name ==$destinations[2])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[3]))?$destinations[3]:'Destinasi 4' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[3]) && $dest->name ==$destinations[3])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[4]))?$destinations[4]:'Destinasi 5' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[4]) && $dest->name ==$destinations[4])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[5]))?$destinations[5]:'Destinasi 6' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[5]) && $dest->name ==$destinations[5])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[6]))?$destinations[6]:'Destinasi 7' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[6]) && $dest->name ==$destinations[6])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[7]))?$destinations[7]:'Destinasi 8' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[7]) && $dest->name ==$destinations[7])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[8]))?$destinations[8]:'Destinasi 9' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[8]) && $dest->name ==$destinations[8])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($destinations[9]))?$destinations[9]:'Destinasi 10' }}</option>
                        @foreach($destination as $dest)
                          <option value="{{ $dest->id}}" {{ (isset($destinations[9]) && $dest->name ==$destinations[9])?'selected':'' }}>{{ $dest->name}}</option>
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
                        <option selected disabled>{{ (isset($restaurants[0]))?$restaurants[0]:'Restoran 1' }}</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}" {{ (isset($restaurants[0]) && $rest->name ==$restaurants[0])?'selected':'' }}>{{ $rest->name}}</option>
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
                        <option selected disabled>{{ (isset($restaurants[1]))?$restaurants[1]:'Restoran 2' }}</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}" {{ (isset($restaurants[1]) && $rest->name ==$restaurants[1])?'selected':'' }}>{{ $rest->name}}</option>
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
                        <option selected disabled>{{ (isset($restaurants[2]))?$restaurants[2]:'Restoran 3' }}</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}" {{ (isset($restaurants[2]) && $rest->name ==$restaurants[2])?'selected':'' }}>{{ $rest->name}}</option>
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
                        <option selected disabled>{{ (isset($restaurants[3]))?$restaurants[3]:'Restoran 4' }}</option>
                        @foreach($restaurant as $rest)
                          <option value="{{ $rest->id}}" {{ (isset($restaurants[3]) && $rest->name ==$restaurants[3])?'selected':'' }}>{{ $rest->name}}</option>
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
                        <input id="schedule" type="text" class="form-control @error('schedule') is-invalid @enderror" name="schedule" value="{{ old('schedule') ?? $package->schedule }}" autocomplete="new-schedule">

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
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $package->price }}" autocomplete="new-price">

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
                        <input id="special_price" type="number" class="form-control @error('special_price') is-invalid @enderror" name="special_price" value="{{ old('special_price') ?? $package->special_price }}" autocomplete="new-special_price">

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
                    <textarea rows="6" input  id="description" 
                              type="text" 
                              class="form-control @error('description') is-invalid @enderror" 
                              name="description" 
                              value="{{ old('description') ?? $package->description}}"
                              autocomplete="{{ old('description') ?? $package->description }}" 
                              placeholder="description"
                              autofocus>{{ old('description') ?? $package->description}}</textarea>

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
                    <textarea rows="6" input  id="keterangan" 
                              type="text" 
                              class="form-control @error('keterangan') is-invalid @enderror" 
                              name="keterangan" 
                              value="{{ old('keterangan') ?? $package->keterangan}}"
                              autocomplete="{{ old('keterangan') ?? $package->keterangan }}" 
                              placeholder="keterangan"
                              autofocus>{{ old('keterangan') ?? $package->keterangan}}</textarea>

                        @error('keterangan')
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