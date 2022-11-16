@extends('layouts.navbar_1')

@section('main')
<div class="main">
    <div id="fh5co-tours" style="padding-bottom:0;">
        <div class="tours-cars" style="margin:0 12vw 0 6vw;">
            
          <div class="row">
              <div class="col-md-12 text-center heading-section animate-box title">
                  <h3>Account Setting</h3>
              </div>
          </div>

          <div class="header-nav"> 
            <ul class="nav nav-tabs mt-4" role="tablist" id="tab_list">
                <li class="nav-item text-center col-md-2 {{ (request()->route()->getName()=='profile')?'active':''}}">
                    <a class="nav-link " href="{{ url('/home/profile') }}">
                        General Setting
                    </a>
                </li>
                <li class="nav-item text-center col-md-2 {{ (request()->route()->getName()=='profile.list')?'active':'' }}">
                    <a class="nav-link " href="{{ url('/home/profile/list') }}">
                        Order & Review
                    </a>
                </li>
                <li class="nav-item text-center col-md-2 {{ (request()->route()->getName()=='profile.list_car')?'active':'' }}">
                    <a class="nav-link " href="{{ url('/home/profile/list_car') }}">
                        Car Order
                    </a>
                </li>
            </ul>

            <button class="btn btn-danger btn-logout" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" style="margin-left:3vw;height:6vh;width:8vw !important;">Logout</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
          </div>

          <div class="row" style="margin-bottom:5vh;">
              <div class="col-lg-12">
                  <div class="card box-profile">
                      <div class="card-body">
                          <h5 class="card-title profile-title">List of Package Orders</h5>
                          <div for="name" class="col-md-12 text-left profile-text" style="margin-bottom:5vh !important;">
                            You can Add Review, Edit and Cancel The Order In This Section.    
                          </div>
                          <div style="margin-left: 2vw !important;">
                            <table class="table table-striped yajra-datatable">
                              <thead>
                                <tr>
                                  <th style="font-size:14px;">Order Date</th>
                                  <th style="font-size:14px;">Package</th>
                                  <th style="font-size:14px;">Payment Method</th>
                                  <th style="font-size:14px;"> Pick Point</th>
                                  <th style="font-size:14px;">Departure Date</th>
                                  <th style="font-size:14px;">Status</th>
                                  <th style="font-size:14px;">Actions</th>
                                  <th style="font-size:14px;">Change Payment</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                      </div>    
                  </div>
              </div>
              
          </div>
                
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url:'/home/profile/list_order',
          method:'GET'
        },
        lengthMenu: [5, 10, 20, 50],
        columns: [
            {data: 'date', name: 'date'},
            {data: 'package', name: 'package'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'pick_point', name: 'pick_point'},
            {data: 'departure_date', name: 'departure_date'},
            {
              data: 'status', 
              name: 'status',
              render: function(data, type) {
                    if (type === 'display') {
                      if (data === 'pending'){
                        return `<h5><span class="badge badge-warning" style="background-color: #ffed4a;color: #212529;border-radius: 0.25rem;">Pending</span></h5>`;
                      }
                      else if (data === 'canceled') {
                        return `<h5><span class="badge badge-danger text-white" style="background-color:#e3342f;border-radius: 0.25rem;">Canceled</span></h5>`;
                      }
                      else if (data === 'delivered') {
                        return `<h5><span class="badge badge-info text-white" style="background-color:#6cb2eb;border-radius: 0.25rem;">Delivered</span></h5>`;
                      }
                      else if (data === 'success') {
                        return `<h5><span class="badge badge-success text-white" style="background-color:#38c172;border-radius: 0.25rem;">Success</span></h5>`;
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
                        <a href= '/home/${data}/review' data-toggle='tooltip' data-placement='top' title='Review and Edit'><i class='fa fa-comments fa-action'></i></a>
                        <a href='/home/${data}/cancel' data-toggle='tooltip' data-placement='top' title='Cancel'><i class='fa fa-ban fa-action'></i></a>
                        `
                     
                    return html;
              }
            },
            {
              data: 'id', 
              name: 'id',
              data_1: 'status',
              render: function(data, type,data_1) {
                  html = ``;
                  if(data_1.status == 'pending')
                  {
                      html = `
                          <a href='/home/package/${data}/payment' data-toggle='tooltip' data-placement='top' title='Payment Info'><i class='fa fa-info fa-action'></i></a>
                          `
                  } else if(data_1.status == 'success' && data_1.payment_method != 'bank' && data_1.pdf_url != null){
                      html = `
                          <a href='${data_1.pdf_url}' data-toggle='tooltip' data-placement='top' title='Payment Info'><i class='fa fa-info fa-action'></i></a>
                          `
                  }
                  return html; 
              }
            }
  
        ]   
    });
    
  });
</script>
@if(session('alert-success'))
<script>alert('Order Created')</script>
@elseif(session('alert-failed'))
<script>alert('Something Wrong')</script>
@endif
@endsection