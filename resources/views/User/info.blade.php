@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail User</h1>
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
                  <h3 class="card-title">Informasi User: {{ $user->name }}</h3>
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
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>No HP</td>
                        <td>{{ $user->no_handphone }}</td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Status</td>
                        <td>{{ $user->status }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Daftar Pesanan</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped yajra-datatable">
                      <thead>
                        <tr>
                          <th>Paket</th>
                          <th>Tanggal Pesanan</th>
                          <th>Metode Pembayaran</th>
                          <th>Titik Jemput</th>
                          <th>Tanggal Keberangkatan</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
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
<script>
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url:'/user/<?php echo $user->id;?>/list',
          method:'GET'
        },
        columns: [
            {data: 'package', name: 'package'},
            {data: 'date', name: 'date'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'pick_point', name: 'pick_point'},
            {data: 'departure_date', name: 'departure_date'},
            {
              data: 'status', 
              name: 'status',
              render: function(data, type) {
                    if (type === 'display') {
                      if (data === 'pending'){
                        return `<h5><span class="badge badge-warning">Pending</span></h5>`;
                      }
                      else if (data === 'canceled') {
                        return `<h5><span class="badge badge-danger text-white">Canceled</span></h5>`;
                      }
                      else if (data === 'delivered') {
                        return `<h5><span class="badge badge-info text-white">Delivered</span></h5>`;
                      }
                      else if (data === 'success') {
                        return `<h5><span class="badge badge-success text-white">Success</span></h5>`;
                      }
                    }
                     
                    return data;
              }

            },
  
        ]   
    });
    
  });
</script>
@endsection