@extends('layouts.navbar_1')

@section('css')
    <link href="{{ asset('css/account_setting/style.css') }}" rel="stylesheet"></link>
@endsection

@section('main')
<div class="main">
    <div id="fh5co-tours" class="fh5co-section-gray" style="padding-bottom:0;">
        <div class="tours-cars" style="margin:0 12vw 0 6vw;">
            <form method="POST" action="{{ route('profile.update')}}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-12 text-center heading-section animate-box">
                        <h3>Account Setting</h3>
                    </div>
                </div>

                <ul class="nav nav-tabs mt-4" role="tablist" id="tab_list">
                    <li class="nav-item text-center col-md-2 active">
                        <a class="nav-link " href="#general_setting" role="tab" data-toggle="tab">
                            General Setting
                        </a>
                    </li>
                    <li class="nav-item text-center col-md-2">
                        <a class="nav-link " href="#order_and_review" role="tab" data-toggle="tab">
                            Order & Review
                        </a>
                    </li>
                    <li class="nav-item text-center col-md-2">
                        <a class="nav-link " href="#car_order" role="tab" data-toggle="tab">
                            Car Order
                        </a>
                    </li>
                </ul>

                <div class="tab-content mb-6" id="tab_content">
                    <div role="tabpanel" class="tab-pane active" aria-selected="true" id="general_setting">
                        <div class="col-md-12 mb-6">
                            @include('Profile.tabs.general_setting')
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" aria-selected="true" id="order_and_review">
                        <div class="col-md-12 mb-6">
                            @include('Profile.tabs.order_setting')
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" aria-selected="true" id="car_order">
                        <div class="col-md-12 mb-6">
                            @include('Profile.tabs.car_setting')
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-center" style="margin-top:8vh;">
                    <button class="btn btn-primary text-white col-md-6 text-button">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).on('click', '.logout-button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: "Are you sure want to logout?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
  if (willDelete) {
            window.location = "/logout";
        } 
    });
});
</script>
<script type="text/javascript">
$(document).on('click', '.delete-account', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: "Are you sure want to delete your account?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
  if (willDelete) {
            window.location = "/home/profile/delete";
        } 
    });
});
</script>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
    function password_show_hide_1() {
        var x = document.getElementById("new_password");
        var show_eye = document.getElementById("show_eye_1");
        var hide_eye = document.getElementById("hide_eye_1");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
    function password_show_hide_2() {
        var x = document.getElementById("new_confirm_password");
        var show_eye = document.getElementById("show_eye_2");
        var hide_eye = document.getElementById("hide_eye_2");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

<script>
  $(function () {
    
    var table = $('#order_table').DataTable({
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

<script>
  $(function () {
    
    var table = $('#car_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url:'/home/profile/list_car_order',
          method:'GET'
        },
        lengthMenu: [5, 10, 20, 50],
        columns: [
            {data: 'date', name: 'date'},
            {data: 'car', name: 'car'},
            {data: 'payment_method', name: 'payment_method'},
            // {data: 'day_usage', name: 'day_usage'},
            {data: 'rental_date', name: 'rental_date'},
            {data: 'price', name: 'price'},
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
                  <a href='/home/${data}/cancel_car' data-toggle='tooltip' data-placement='top' title='Cancel'><i class='fa fa-ban fa-action'></i></a>
                        `
                     
                    return html;
              }
            },
            {
              data: 'id', 
              name: 'id',
              data_1: 'status',
              render: function(data, type,data_1) {
                  html = ``
                  if(data_1.status == 'pending')
                  {
                      html = `
                          <a href='/home/car/${data}/payment' data-toggle='tooltip' data-placement='top' title='Payment Info'><i class='fa fa-info fa-action'></i></a>
                          `
                  } else if(data_1.status == 'success' && data_1.payment_method != 'bank' && data_1.pdf_url != null){
                      html = `
                          <a href='${data_1.pdf_url}' data-toggle='tooltip' data-placement='top' title='Payment Info'><i class='fa fa-info fa-action'></i></a>
                          `
                  }
                  return html;
                  
                  
              }
            },
        ]   
    });
    
  });
</script>

@endsection