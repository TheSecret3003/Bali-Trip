@extends('layouts.sidebar')

@section('content-wrapper')
<?php
setlocale(LC_TIME, 'IND');  // or setlocale(LC_TIME, 'id_ID');
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pesanan Tanggal {{strftime('%d %B %Y')}}</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pesanan Paket</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered yajra-datatable">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Paket</th>
                        <th>Tanggal Pesanan</th>
                        <th>Metode Pembayaran</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Titik Jemput</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              @if(!$is_disable_date['package'])
                <div class="card-footer clearfix">
                  <a href="{{ route('dashboard.disable_date', $date) }}" class="btn btn-sm btn-danger float-right">Disable Pesanan</a>
                </div>
              @else
                <div class="card-footer clearfix">
                  <a href="{{ route('dashboard.enable_date', $date) }}" class="btn btn-sm btn-info float-right">Enable Pesanan</a>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pesanan Mobil</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered yajra-datatable-car">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Mobil</th>
                        <th>Tanggal Pesanan</th>
                        <th>Metode Pembayaran</th>
                        <th>Jumlah Mobil</th>
                        <th>Harga Pesanan</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              @if(!$is_disable_date['car'])
                <div class="card-footer clearfix">
                  <a href="{{ route('dashboard.disable_date_car', $date) }}" class="btn btn-sm btn-danger float-right">Disable Pesanan</a>
                </div>
              @else
                <div class="card-footer clearfix">
                  <a href="{{ route('dashboard.enable_date_car', $date) }}" class="btn btn-sm btn-info float-right">Enable Pesanan</a>
                </div>
              @endif
            </div>
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
          url:'/dashboard/<?php echo $date;?>/departure_list',
          method:'GET'
        },
        columns: [
            {data: 'user', name: 'user'},
            {data: 'package', name: 'package'},
            {data: 'date', name: 'date'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'regency', name: 'regency'},
            {data: 'district', name: 'district'},
            {data: 'village', name: 'village'},
            {data: 'pick_point', name: 'pick_point'},
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
            {
              data: 'id', 
              name: 'id',
              render: function(data, type) {
                  html = `
                        <a href='/dashboard/${data}/edit_order')' data-toggle='tooltip' data-placement='top' title='Edit'>
                        <i class='fa fa-edit fa-action'></i></a>
                        `
                     
                    return html;
              }
            }
        ]   
    });
    
  });
</script>
<script>
  $(function () {
    
    var table = $('.yajra-datatable-car').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url:'/dashboard/<?php echo $date;?>/car_list',
          method:'GET'
        },
        columns: [
            {data: 'user', name: 'user'},
            {data: 'car', name: 'car'},
            {data: 'date', name: 'date'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'car_amount', name: 'car_amount'},
            {data: 'total_price', name: 'total_price'},
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
            {
              data: 'id', 
              name: 'id',
              render: function(data, type) {
                  html = `
                        <a href='/dashboard/${data}/edit_car_order')' data-toggle='tooltip' data-placement='top' title='Edit'>
                        <i class='fa fa-edit fa-action'></i></a>
                        `
                     
                    return html;
              }
            }
        ]   
    });
    
  });
</script>
@endsection