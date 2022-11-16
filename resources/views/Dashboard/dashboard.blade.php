@extends('layouts.sidebar')

@section('content-wrapper')
<div class="content-wrapper"  >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$history["delivered"]}} Pesanan Paket</h3>

                <p>Sudah Berjalan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$history["success"]}} Pesanan Paket</h3>

                <p>Sedang Berjalan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$history["canceled"]}} Pesanan Paket</h3>

                <p>Cancel</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Pemesanan Paket</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <p class="text-center">
                      Progress Pesanan Paket
                    </p>
                    <div class="chart">
                      <canvas id="chart-order" height="250"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Jenis Paket</h3>
                  <div class="card-tools">
                  </div>
                </div>
              </div>
              <div class="card-body">

                <div class="position-relative mb-4">
                  <canvas id="pieChart" height="200"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Destinasi Favorit</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Top 5</span>
                  </p>
                </div>
                <div class="position-relative mb-4">
                  <canvas id="destination-chart" height="285"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Tours</div>
                    <div class="external-event bg-info">Go Home</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pesanan Paket Hari ini</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0 yajra-datatable">
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
                          <th>Tanggal Keberangkatan</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pesanan Mobil Hari ini</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0 yajra-datatable-car">
                    <thead>
                        <tr>
                          <th>User</th>
                          <th>Mobil</th>
                          <th>Tanggal Pesanan</th>
                          <th>Metode Pembayaran</th>
                          <th>Jumlah Mobil</th>
                          <th>Tanggal Pengambilan</th>
                          <th>Harga Pesanan</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
@section('js')
<!-- jQuery -->
<!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script>
  $(function() {
  
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode      = 'index'
    var intersect = true

    //line-chart order progress

    var order_data = <?php echo $orders ?>;
    var values = Object.values(order_data);
    console.log(values);
    var $chart_order = $('#chart-order')
    var chart_order  = new Chart($chart_order, {
      data   : {
        labels  : ['Januari', 'Februari', 'Maret', 'April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
        datasets: [
          {
          type                : 'line',
          label               : 'success',
          data                : values[0],
          backgroundColor     : 'transparent',
          borderColor         : '#007bff',
          pointBorderColor    : '#007bff',
          pointBackgroundColor: '#007bff',
          fill                : false
        },
        {
          type: 'line',
          label: 'canceled',
          data: values[1],
          backgroundColor: 'tansparent',
          borderColor: '#FF0000',
          pointBorderColor: '#FF0000',
          pointBackgroundColor: '#FF0000',
          fill: false
        }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: true
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero : true,
              suggestedMax: values[2]
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    })

    // Pie Chart Package Type
    var user_data = <?php echo $packages ?>;
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Tour', 
          'Optional',  
      ],
      datasets: [
        {
          data: user_data,
          backgroundColor : ['#f56954', '#00a65a'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: true
      }
    }
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    // Bar Chart Favorite Destination
    var destination_data = <?php echo $destinations ?>;
    var $destinationChart = $('#destination-chart')
    // eslint-disable-next-line no-unused-vars
    var destinationChart = new Chart($destinationChart, {
      type: 'bar',
      data: {
        labels: Object.keys(destination_data),
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            data: Object.values(destination_data)
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })
  });
</script>
<script>
  $(function () {
    
    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });


    var events = []; //The array
    var departure_data = <?php echo $departures ?>;
    var count = Object.keys(departure_data.date).length;

    for(var i =0; i < count; i++) 
    {
      if(departure_data.type[i] == 'package'){
          events.push( 
          { 
            title: "Pesanan Paket" , 
            start: departure_data.date[i],
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            url            : "/dashboard/"+departure_data.date[i]+"/departure_date",
            allDay         : true
          }
        )
      } else {
        events.push( 
          { 
            title: "Pesanan Mobil" , 
            start: departure_data.date[i],
            backgroundColor: '#0096FF', //red
            borderColor    : '#0096FF', //red
            url            : "/dashboard/"+departure_data.date[i]+"/departure_date",
            allDay         : true
          }
        )
      }
      
    }

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: events,
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
<script>
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url:'/dashboard/list',
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
          url:'/dashboard/list_car_order',
          method:'GET'
        },
        columns: [
            {data: 'user', name: 'user'},
            {data: 'car', name: 'car'},
            {data: 'date', name: 'date'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'car_amount', name: 'car_amount'},
            {data: 'rental_date', name: 'rental_date'},
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
<script>
  setTimeout(function() {
    location.reload();
  }, 600000);
</script>
@endsection
  