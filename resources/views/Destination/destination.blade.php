@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Destinasi</h1>
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
                        <th>Nama Destinasi</th>
                        <th>Jumlah Paket</th>
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
        ajax: "{{ route('destination.list') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'count', name: 'count'},
            {
              data: 'id', 
              name: 'id',
              render: function(data, type) {
                  html = `
                        <a href='/destination/${data}/edit')' data-toggle='tooltip' data-placement='top' title='Edit'>
                        <i class='fa fa-edit fa-action'></i></a>
                        <a href='/destination/${data}/destroy')' data-toggle='tooltip' data-placement='top' title='Delete'>
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