@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Mobil</h1>
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
                        <th>Nama Mobil</th>
                        <th>Jumlah Pesanan</th>
                        <th>Maks Penumpang</th>
                        <th>Harga</th>
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
        ajax: "{{ route('car.list') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'count_order', name: 'count_order'},
            {data: 'max_person', name: 'max_person'},
            {data: 'price', name: 'price'},
            {
              data: 'id', 
              name: 'id',
              render: function(data, type) {
                  html = `
                        <a href='/car/${data}/edit')' data-toggle='tooltip' data-placement='top' title='Edit'>
                        <i class='fa fa-edit fa-action'></i></a>
                        <a href='/car/${data}/destroy')' data-toggle='tooltip' data-placement='top' title='Delete'>
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