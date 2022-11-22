@extends('layouts.sidebar')

@section('content-wrapper')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Paket Tour</h1>
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
            <form method="POST" action="{{ route('package.update_tour', $package->id)}}" enctype="multipart/form-data" id="form-package-tour">
              @csrf
              <div class="card-header bg-primary">
                <div class="d-flex">
                  <h3 class="card-title">Data Paket</h3>
                  <div class="ml-auto">
                    <button class="btn btn-primary" id="add_day" onclick="cloneDay(event)">Tambah hari</button>
                    <button class="btn btn-danger mr-3" id="delete" onclick="deleteDay(event)">Hapus hari</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <ul class="nav nav-tabs" role="tablist" id="tab_list">
                <li class="nav-item">
                  <a class="nav-link active" href="#package" role="tab" data-toggle="tab">Paket</a>
                </li>
                @foreach($days as $day)
                <li class="nav-item">
                  <a class="nav-link" id="day_tab_{{$day}}" href="#day_{{$day}}" role="tab" data-toggle="tab">Hari - {{$day}}</a>
                </li>
                @endforeach
              </ul>
              <div class="tab-content" id="tab_content">
                <div role="tabpanel" class="tab-pane active" aria-selected="true" id="package">
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
                        <label for="hotel1" class="col-md-4 col-form-label text-md-right">Hotel 1</label>

                        <div class="col-md-6">
                          <select id="hotel1" class="form-control @error('hotel1') is-invalid @enderror" name="hotel1" value="{{ old('hotel1')}}" autocomplete="hotel1" autofocus>
                            <option selected disabled>{{ (isset($hotels[0]))?$hotels[0]:'Hotel 1' }}</option>
                            @foreach($hotel as $hot)
                              <option value="{{ $hot->id}}" {{ (isset($hotels[0]) && $hot->name ==$hotels[0])?'selected':'' }}>{{ $hot->name}}</option>
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
                            <option selected disabled>{{(isset($hotels[1]))?$hotels[1]:'Hotel 2'}}</option>
                            @foreach($hotel as $hot)
                              <option value="{{ $hot->id}}" {{ (isset($hotels[1]) && $hot->name ==$hotels[1])?'selected':'' }}>{{ $hot->name}}</option>
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
                            <option selected disabled>{{(isset($hotels[2]))?$hotels[2]:'Hotel 3'}}</option>
                            @foreach($hotel as $hot)
                              <option value="{{ $hot->id}}" {{ (isset($hotels[2]) && $hot->name ==$hotels[2])?'selected':'' }}>{{ $hot->name}}</option>
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
                            <option selected disabled>{{(isset($hotels[3]))?$hotels[3]:'Hotel 4'}}</option>
                            @foreach($hotel as $hot)
                              <option value="{{ $hot->id}}" {{ (isset($hotels[3]) && $hot->name ==$hotels[3])?'selected':'' }}>{{ $hot->name}}</option>
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
                </div>
                @php
                  $dest_number = 1;
                  $rest_number = 1;
                  $index = 0;
                @endphp
                @foreach($days as $day)
                <div role="tabpanel" class="tab-pane day" id="day_{{$day}}">
                  <input type="hidden" name="day[]" value="{{$day}}">
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="d-flex">
                            <h4>Destinasi</h4>
                            <button class="btn btn-primary ml-auto" data-id="{{$day}}" data-index="{{$index}}" onclick="cloneDestination(event)">+</button>
                          </div> 
                        </div>
                      </div>
                      <div class="destination" id="destination_parent_{{$day}}">
                        @foreach($package->dest_packs->where('day_id', $day) as $dest_pack)
                        
                        <div class="row mt-2 destination-row">
                          <div class="col-md-10">
                            <select id="destination_{{$dest_number}}" class="form-control destination-item select2" name="destination[{{$index}}][]">
                              @foreach($destinations as $ds)
                                @if($ds->id == $dest_pack->destination_id)
                                <option value="{{$ds->id}}" selected>{{$ds->name}}</option>
                                @else
                                <option value="{{$ds->id}}">{{$ds->name}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-2">
                            <div class="col-1">
                                <button onclick="$(this).closest('.destination-row').remove();" class="btn btn-danger" style="display: block"><i class="fa fa-trash"></i></button>
                            </div>
                          </div>
                        </div>
                        @php
                          $dest_number++;
                        @endphp
                        @endforeach
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="d-flex">
                            <h4>Restaurant</h4>
                            <button class="btn btn-primary ml-auto" data-id="{{$day}}" data-index="{{$index}}" onclick="cloneRestaurant(event)">+</button>
                          </div>        
                        </div>       
                      </div>
                      <div class="restaurant" id="restaurant_parent_{{$day}}">
                        @foreach($package->rest_packs->where('day_id', $day) as $rest_pack)
                        
                        <div class="row mt-2 restaurant-row">
                          <div class="col-md-10">
                            <select id="restaurant_{{$rest_number}}" class="form-control restaurant-item select2" name="restaurant[{{$index}}][]">
                              @foreach($restaurants as $rs)
                                @if($rs->id == $rest_pack->restaurant_id)
                                <option value="{{$rs->id}}" selected>{{$rs->name}}</option>
                                @else
                                <option value="{{$rs->id}}">{{$rs->name}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-2">
                            <div class="col-1">
                                <button onclick="$(this).closest('.restaurant-row').remove();" class="btn btn-danger" style="display: block"><i class="fa fa-trash"></i></button>
                            </div>
                          </div>
                        </div>
                        @php
                          $rest_number++;
                        @endphp
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                @php
                  $index ++;
                @endphp
                @endforeach
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

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

  $(document).ready(function(){
    var uploadfile = null;

    $('.destination-item').select2({
        placeholder: 'Pilih destinasi',
        width: '100%'
    });
    $('.restaurant-item').select2({
        placeholder: 'Pilih destinasi',
        width: '100%'
    });

    $('#image').change(function(){
      uploadfile = this.files[0];
    })

    $('#form-package-tour').submit(function(e){
      e.preventDefault();

      var form_data = $(this).serializeArray();

      var formData = new FormData();
      for ( i=0;i<form_data.length;i++) {
          formData.append(form_data[i]['name'], form_data[i]['value']);
      }

      if(uploadfile){
        formData.append("image", uploadfile);
      }

      let method = $(this).attr('method');
      let action = $(this).attr('action');
      $.ajax({
        method: method,
        url: action,
        data: formData,
        processData : false,
        contentType : false,
        success: function(data){
          $('#error-alert').hide();

          $('#success-alert').append(data.message);
          $('#success-alert').show();
          swal("Berhasil", "Order berhasil diubah", "success").then((value) => {
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

  function deleteDay(e){
    e.preventDefault();
    let number = $('.day').length;
    console.log(number);
    $(`.tab-pane#day_${number}`).remove();
    $(`.nav-link#day_tab_${number}`).closest('li').remove();
  }

  function cloneDay(e){
    e.preventDefault();
    let index = $('.day').length;
    let number = index + 1;
    let tab = `
      <li class="nav-item">
        <a class="nav-link" id="day_tab_${number}" href="#day_${number}" role="tab" data-toggle="tab">Hari ${number}</a>
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
    console.log(index);
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