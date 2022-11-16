@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Paket</h1>
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
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered yajra-datatable">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Jumlah Destinasi</th>
                        <th>Jumlah Restoran</th>
                        <th>Jumlah Pesanan</th>
                        <th>Jadwal</th>
                        <th>Harga</th>
                        <th>Harga Spesial</th>
                        <th>Harga (Diskon)</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
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
        ajax: "{{ route('package.list') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'type', name: 'type'},
            {data: 'count_destination', name: 'count_destination'},
            {data: 'count_restaurant', name: 'count_restaurant'},
            {data: 'count_order', name: 'count_order'},
            {data: 'schedule', name: 'schedule'},
            {data: 'price', name: 'price'},
            {data: 'special_price', name: 'special_price'},
            {data: 'price_discount', name: 'price_discount'},
            {
              data: 'id', 
              name: 'id',
              render: function(data, type) {
                  html = `
                        <a href='/package/${data}/info')' data-toggle='tooltip' data-placement='top' title='Info'>
                        <i class="fas fa-info fa-action"></i></a>
                        <a href='/package/${data}/edit' data-toggle='tooltip' data-placement='top' title='Edit'>
                        <i class='fa fa-edit fa-action'></i></a>
                        <a href='/package/${data}/destroy' data-toggle='tooltip' data-placement='top' title='Delete'>
                        <i class='fa fa-trash-alt fa-action'></i></a>
                        `      
                    return html;
              }
            }
        ]
    });
    
  });
</script>
@endsection