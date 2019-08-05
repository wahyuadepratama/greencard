@extends('layout.master')

@include('layout.menu_admin')

@section('content')
<div class="container" style="padding-top:20px;">
  <!-- <div class="form-inline">
    <div class="form-group">
      <label for="">Tahun &nbsp;</label>
      <select class="form-control " >
        <option value="2019"> Semua</option>
        <option value="2019"> 2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
      </select>
    </div>
  </div> -->
<!-- START COLLAPSE -->
  <div class="mt-4">
   <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Grafik Pencapaian Section
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <!-- <canvas id="chartPencapaian"></canvas> -->
          <div id="chartPencapaian" style="max-width: auto; height: 400px; margin: 0 auto"></div>
          <button id="large">Large</button>
         <button id="small">Small</button>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Grafik KTA - TTA
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
        <div id="chartKta" style="max-width: auto; height: 400px; margin: 0 auto"></div>

        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Grafik Lokasi
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <div id="chartLokasi" style="max-width: auto; height: 400px; margin: 0 auto"></div>
            <button id="largechartLokasi">Large</button>
            <button id="smallchartLokasi">Small</button>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingFourth">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFourth" aria-expanded="false" aria-controls="collapseThree">
            Grafik Status Temuan
          </button>
        </h2>
      </div>
      <div id="collapseFourth" class="collapse" aria-labelledby="headingFourth" data-parent="#accordionExample">
        <div class="card-body">
          <div id="chartStatus" style="max-width: auto; height: 400px; margin: 0 auto"></div>


        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- END COLLAPSE -->
</div>
<style media="screen">
</style>
@endsection

@section('js-chart')
<script>
var chart = Highcharts.chart('chartPencapaian', {
    chart: {
        type: 'bar',
        // scrollablePlotArea: {
        //     minWidth:300 ,
        //     scrollPositionX: 0
        // }
    },
    responsive:{
    },
    title: {
        text: 'Grafik Pencapaian Section',
        align:'left'
    },
    subtitle: {
        text: 'Source: <a href="https://greencardbuma.com">Greencard Buma</a>'
    },
    xAxis: {
        categories: [@php foreach ($reports as $report) {
          $x = \App\Models\Section::where('id', $report->section_id)->first();
          echo '"'. $x->name . '",';
        } @endphp],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Greencard Man Power / Section',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' greencard'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Greencard',
        data: [@php foreach ($reports as $report) {
              echo $report->section_count . ',';
            } @endphp]
    }]
});

var chartKta = Highcharts.chart('chartKta', {
    chart: {
        type: 'pie',
        scrollablePlotArea: {
            minWidth:300 ,
            scrollPositionX: 0
        }
    },
    responsive:{
    },
    title: {
        text: 'KTA - TTA',
        align:'left'
    },
    subtitle: {
        text: 'Source: <a href="https://greencardbuma.com">Greencard Buma</a>'
    },
    xAxis: {
        categories: ['Kondisi Tidak Aman', 'Tindakan Tidak Aman'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ' greencard',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' greencard'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    series: [{
        minPointSize: 10,
        innerSize: '20%',
        zMin: 0,
        name: 'KTA - TTA',
        data: [{
            name: 'Kondisi Tidak Aman',
            y: <?= $kta ?>
        }, {
            name: 'Tindakan Tidak Aman',
            y: <?= $tta ?>
        }]
    }]
});

var chartLokasi = Highcharts.chart('chartLokasi', {
  chart: {
     renderTo: 'container',
     type: 'column',
     // scrollablePlotArea: {
     //     minWidth:300 ,
     //     scrollPositionX: 0
     // },
     options3d: {
         enabled: true,
         alpha: 15,
         beta: 15,
         depth: 50,
         viewDistance: 25
     }
 },
 title: {
     text: 'Grafik Lokasi'
 },
 xAxis: {
     categories: ['Office', 'Warehouse', 'Workshop', 'Area Tambang (OB)', 'Area Tambang (Coal)', 'Area Mess', 'Pit Stop / Shutdown', 'Area Lainnya'],
     title: {
         text: null
     }
 },
 plotOptions: {
     column: {
         depth: 25
     }
 },
 options3d: {
        enabled: true,
        alpha: 0,
        beta: 30,
        depth: 50
   },
 series: [{
     name: ['Greencard'],
     data: [{{ $gk->office }}, {{ $gk->warehouse }}, {{ $gk->workshop }}, {{ $gk->tambang_ob }}, {{ $gk->tambang_coal }}, {{ $gk->mess }}, {{ $gk->pit_stop }}, {{ $gk->area_lainnya }}]
 }]
});

var chartStatus = Highcharts.chart('chartStatus', {
  chart: {
      type: 'pie',
      scrollablePlotArea: {
          minWidth:300 ,
          scrollPositionX: 0
      },
      options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
      }
  },
  title: {
      text: 'Grafik Status Temuan'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          depth: 35,
          dataLabels: {
              enabled: true,
              format: '{point.name}'
          }
      }
  },
  series: [{
      type: 'pie',
      name: 'Status',
      data: [
          ['Open', {{ $open }}],
          ['Close', {{ $close }}]
      ]
  }]
});

$('#small').click(function () {
    chart.setSize($('.card-body').width()/2, 400);
});

$('#large').click(function () {
    chart.setSize($('.card-body').width(), 400);
});

// $('#largechartLokasi').click(function () {
//     chartLokasi.setSize($('.card-body').width()/2, 400);
// });
//
// $('#smallchartLokasi').click(function () {
//     chartLokasi.setSize($('.card-body').parent.width(), 400);
// });

</script>
@endsection
