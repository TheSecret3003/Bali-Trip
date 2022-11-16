@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar User</h1>
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
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Jumlah Pesanan</th>
                        <th>Status</th>
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
        ajax: "{{ route('user.list') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'no_handphone', name: 'no_handphone'},
            {data: 'count_order', name: 'count_order'},
            {data: 'status', name: 'status'},
            {
              data: 'id', 
              name: 'id',
              render: function(data, type) {
                  html = `
                        <a href='/user/${data}/info')' data-toggle='tooltip' data-placement='top' title='Info'>
                        <i class="fas fa-info fa-action"></i></a>
                        <a href='/user/${data}/edit' data-toggle='tooltip' data-placement='top' title='Edit'>
                        <i class='fa fa-edit fa-action'></i></a>
                        <a href='/user/${data}/ban' data-toggle='tooltip' data-placement='top' title='Ban'>
                        <i class='fa fa-ban fa-action'></i></a>
                        `      
                    return html;
              }
            }
        ]
    });
    
  });
</script>
@endsection