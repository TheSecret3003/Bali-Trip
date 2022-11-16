@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Tanggal Pesanan Tidak Bisa Dilakukan</h1>
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
                        <th>Tanggal </th>
                        <th>Jenis Pesanan</th>
                        <th>Keterangan</th>
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
        ajax: "{{ route('disable_date.list') }}",
        columns: [
            {data: 'disable_date', name: 'disable_date'},
            {data: 'type', name: 'type'},
            {data: 'keterangan', name: 'keterangan'},
            {
              data: 'id', 
              name: 'id',
              render: function(data, type) {
                  html = `
                        <a href='/disable_date/${data}/destroy')' data-toggle='tooltip' data-placement='top' title='Delete'>
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