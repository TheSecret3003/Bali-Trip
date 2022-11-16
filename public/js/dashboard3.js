$(function () {
  'use strict'

  
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $chartKredit = $('#chart-kredit')
  var chartKredit  = new Chart($chartKredit, {
    data   : {
      labels  : ['Senin', 'Selasa', 'Rabu', 'Kamis','Jumat','Sabtu','Minggu'],
      datasets: [
        {
        type                : 'line',
        data                : [5, 20, 23, 40, 50, 60, 70],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
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
        display: false
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
            suggestedMax: 200
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

  var $chartSimpanan = $('#chart-simpanan')
  var chartSimpanan  = new Chart($chartSimpanan, {
    data   : {
      labels  : ['Januari', 'Februari', 'Maret', 'April','Mei','Juni'],
      datasets: [
        {
        type                : 'line',
        data                : [100, 200, 230, 340, 250, 360, 270],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
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
        display: false
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
            suggestedMax: 200
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

  var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d')
  var pieData2        = {
    labels: [
        'Sukarela', 
        'Program',
        'Deposito'  
    ],
    datasets: [
      {
        data: [110,100,130],
        backgroundColor : ['#00a65a','#00c0ef','#f39c14'],
      }
    ]
  }
  var pieOptions     = {
    legend: {
      display: true
    }
  }
  var pieChart = new Chart(pieChartCanvas2, {
    type: 'pie',
    data: pieData2,
    options: pieOptions      
  })
})


