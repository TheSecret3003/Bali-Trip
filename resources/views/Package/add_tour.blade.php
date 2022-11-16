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
  <div class="alert alert-danger" id="error-alert" role="alert" style="display: none;">
  </div>
  <div class="alert alert-success" id="success-alert" role="alert" style="display: none;">
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="d-flex">
                <h3 class="card-title">Buat Paket Tour</h3>
                <button class="btn btn-primary ml-auto" id="add_day" onclick="cloneDay(event)">Tambah hari</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- form start -->
              <form method="POST" action="{{ route('package.store_tour') }}" id="form-package-tour" enctype="multipart/form-data">
                @csrf

                
              <ul class="nav nav-tabs" role="tablist" id="tab_list">
                <li class="nav-item">
                  <a class="nav-link active" href="#package" role="tab" data-toggle="tab">Paket</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content" id="tab_content">
                <div role="tabpanel" class="tab-pane active" aria-selected="true" id="package">

                  <div class="form-group row mt-2">
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
                      <label for="hotel1" class="col-md-4 col-form-label text-md-right">Hotel 1</label>
  
                      <div class="col-md-6">
                        <select id="hotel1" class="form-control @error('hotel1') is-invalid @enderror" name="hotel1" value="{{ old('hotel1')}}" autocomplete="hotel1" autofocus>
                          <option selected disabled>Hotel 1</option>
                          @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id}}">{{ $hotel->name}}</option>
                          @endforeach
                        </select>
  
                          @error('hotel1')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
  
                  <div class="form-group row">
                      <label for="hotel2" class="col-md-4 col-form-label text-md-right">Hotel 2</label>
  
                      <div class="col-md-6">
                        <select id="hotel2" class="form-control @error('hotel2') is-invalid @enderror" name="hotel2" value="{{ old('hotel2')}}" autocomplete="hotel2" autofocus>
                          <option selected disabled>Hotel 2</option>
                          @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id}}">{{ $hotel->name}}</option>
                          @endforeach
                        </select>
  
                          @error('hotel2')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
  
                  <div class="form-group row">
                      <label for="hotel3" class="col-md-4 col-form-label text-md-right">Hotel 3</label>
  
                      <div class="col-md-6">
                        <select id="hotel3" class="form-control @error('hotel3') is-invalid @enderror" name="hotel3" value="{{ old('hotel3')}}" autocomplete="hotel3" autofocus>
                          <option selected disabled>Hotel 3</option>
                          @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id}}">{{ $hotel->name}}</option>
                          @endforeach
                        </select>
  
                          @error('hotel3')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
  
                  <div class="form-group row">
                      <label for="hotel4" class="col-md-4 col-form-label text-md-right">Hotel 4</label>
  
                      <div class="col-md-6">
                        <select id="hotel4" class="form-control @error('hotel4') is-invalid @enderror" name="hotel4" value="{{ old('hotel4')}}" autocomplete="hotel4" autofocus>
                          <option selected disabled>Hotel 4</option>
                          @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id}}">{{ $hotel->name}}</option>
                          @endforeach
                        </select>
  
                          @error('hotel4')
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
  
                          @error('price')
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
                  
                  <!-- <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <submit-button message="Register"></submit-button>
                      </div>
                  </div> -->
                </div>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

  $(document).ready(function(){
    $('#form-package-tour').submit(function(e){
      e.preventDefault();

      formData = $(this).serializeArray();
      let method = $(this).attr('method');
      let action = $(this).attr('action');
      $.ajax({
        method: method,
        url: action,
        data: formData,
        success: function(data){
          $('#error-alert').hide();

          $('#success-alert').append(data.message);
          $('#success-alert').show();
          swal("Berhasil", "Order berhasil dibuat", "success").then((value) => {
            window.location.replace('{{ route("package.index") }}');
          });

        },
        error: function(err){
          $('#error-alert').empty()
          var response = JSON.parse(err.responseText);

          var errorString = '';
          if (typeof response.validator === 'object') {
              $.each(response.validator, function(key, value) {
                  errorString += value + "<br>";
              });
          } else {
              errorString = response.message;
          }
          $('#error-alert').append(errorString);
          $('#error-alert').show();
          
          $('#error-alert').focus();
        }
      })
    })
  });

  function cloneDay(e){
    e.preventDefault();
    let index = $('.day').length;
    let number = index + 1;
    let tab = `
      <li class="nav-item">
        <a class="nav-link" href="#day_${number}" role="tab" data-toggle="tab">Hari ${number}</a>
      </li>
    `;
    let content = `
    <div role="tabpanel" class="tab-pane day" id="day_${number}">
      <input type="hidden" name="day[]" value="${number}">
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex">
                <h4>Destinasi</h4>
                <button class="btn btn-primary ml-auto" data-id="${number}" data-index="${index}" onclick="cloneDestination(event)">+</button>
              </div> 
            </div>
          </div>
          <div class="destination" id="destination_parent_${number}">
  
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex">
                <h4>Restaurant</h4>
                <button class="btn btn-primary ml-auto" data-id="${number}" data-index="${index}" onclick="cloneRestaurant(event)">+</button>
              </div>        
            </div>       
          </div>
          <div class="restaurant" id="restaurant_parent_${number}">
  
          </div>
        </div>
      </div>
    </div>
    `;

    $('#tab_list').append(tab);
    $('#tab_content').append(content);
  }

  function cloneDestination(e){
    e.preventDefault();
    let target = $(e.target);
    let id = target.attr('data-id');
    let index = target.attr('data-index');
    let number = $('.destination-item').length + 1;

    let option = '';

    let content = `
      <div class="row mt-2 destination-row">
        <div class="col-md-10">
          <select id="destination_${number}" class="form-control destination-item select2" name="destination[${index}][]">
            <option value=""></option>
          </select>
        </div>
        <div class="col-md-2">
          <div class="col-1">
              <button onclick="$(this).closest('.destination-row').remove();" class="btn btn-danger" style="display: block"><i class="fa fa-trash"></i></button>
          </div>
        </div>
      </div>
    `;

    $(`#destination_parent_${id}`).append(content);

    initDestination();
  }

  function initDestination(){
    $('.destination-item').select2({
      placeholder : 'Pilih destinasi',
      ajax : {
        dataType : 'json',
        url : '{{ route("destination.getData") }}',
        delay : 10,
        data : function(params){
          return {
            term : params.term
          }
        },
        processResults: function(data){
          return {
            results: $.map(data, function(obj){
              return {
                id: obj.id,
                text : obj.name
              }
            })
          }
        }
      }
    });
  }

  function cloneRestaurant(e){
    e.preventDefault();
    let target = $(e.target);
    let id = target.attr('data-id');
    let index = target.attr('data-index');
    let number = $('.restaurant-item').length + 1;

    let option = '';

    let content = `
      <div class="row mt-2 restaurant-row">
        <div class="col-md-10">
          <select id="restaurant_${number}" class="form-control restaurant-item select2" name="restaurant[${index}][]">
            <option value=""></option>
          </select>
        </div>
        <div class="col-md-2">
          <div class="col-1">
              <button onclick="$(this).closest('.restaurant-row').remove();" class="btn btn-danger" style="display: block"><i class="fa fa-trash"></i></button>
          </div>
        </div>
      </div>
    `;

    $(`#restaurant_parent_${id}`).append(content);
    initRestaurant();
  }

  function initRestaurant(){
    $('.restaurant-item').select2({
      placeholder : 'Pilih restoran',
      ajax : {
        dataType : 'json',
        url : '{{ route("restaurant.getData") }}',
        delay : 10,
        data : function(params){
          return {
            term : params.term
          }
        },
        processResults: function(data){
          return {
            results: $.map(data, function(obj){
              return {
                id: obj.id,
                text : obj.name
              }
            })
          }
        }
      }
    });
  }
</script>
@endsection