@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Paket</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Informasi Paket: {{ $package->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Informasi</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Tipe</td>
                        <td>{{ $package->type }}</td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Kode Tiket</td>
                        <td>{{ $package->ticket_code }}</td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Jadwal</td>
                        <td>{{ $package->schedule }}</td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Harga</td>
                        <td>{{ number_format($package->price) }}</td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Destinasi:</td>
                        <td></td>
                      </tr>
                      @if(sizeof($destinations) == 1)
                        @for($i = 1;$i <=sizeof($destinations[0]);$i++)
                          <tr>
                            <td></td>
                            <td>{{$i}}</td>
                            <td>{{ $destinations[0][$i-1] }}</td>
                          </tr>
                        @endfor
                        <tr>
                          <td>6.</td>
                          <td>Restoran:</td>
                          <td></td>
                        </tr>
                        @for($i = 1;$i <=sizeof($restaurants[0]);$i++)
                          <tr>
                            <td></td>
                            <td>{{$i}}</td>
                            <td>{{ $restaurants[0][$i-1] }}</td>
                          </tr>
                        @endfor
                      @else
                        @for($i = 1;$i <=sizeof($destinations);$i++)
                            <tr>
                              <td></td>
                              <td>Hari {{$i}}:</td>
                              <td></td>
                            </tr>
                            @for($j = 0;$j < sizeof($destinations[$i]);$j++)
                              <tr>
                                <td></td>
                                <td></td>
                                <td>{{$destinations[$i][$j]}}</td>
                              </tr>
                            @endfor
                        @endfor
                        <tr>
                          <td>6.</td>
                          <td>Restoran:</td>
                          <td></td>
                        </tr>
                        @for($i = 1;$i <=sizeof($restaurants);$i++)
                            <tr>
                              <td></td>
                              <td>Hari {{$i}}:</td>
                              <td></td>
                            </tr>
                            @for($j = 0;$j < sizeof($restaurants[$i]);$j++)
                              <tr>
                                <td></td>
                                <td></td>
                                <td>{{$restaurants[$i][$j]}}</td>
                              </tr>
                            @endfor
                        @endfor
                      @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')
@endsection