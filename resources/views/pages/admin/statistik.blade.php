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
        scrollablePlotArea: {
            minWidth:600 ,
            scrollPositionX: 1
        }
    },
    responsive:{
            // rules:[{
            //     chartOptions:undefined
            //     condition:{
            //           callback:undefined
            //           maxHeight:undefined
            //           maxWidth:100
            //           minHeight:0
            //           minWidth:70
            //     }
            // }]
    },
    title: {
        text: 'Historic World Population by Region',
        align:'left'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
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
        name: 'Year 1800',
        data: [107, 31, 635, 203, 2]
    }, {
        name: 'Year 1900',
        data: [133, 156, 947, 408, 6]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 727, 31]
    }, {
        name: 'Year 2016',
        data: [1216, 1001, 4436, 738, 40]
    }]
});

var chartKta = Highcharts.chart('chartKta', {
    chart: {
        type: 'pie',
        scrollablePlotArea: {
            minWidth:600 ,
            scrollPositionX: 1
        }
    },
    responsive:{
            // rules:[{
            //     chartOptions:undefined
            //     condition:{
            //           callback:undefined
            //           maxHeight:undefined
            //           maxWidth:100
            //           minHeight:0
            //           minWidth:70
            //     }
            // }]
    },
    title: {
        text: 'Historic World Population by Region',
        align:'left'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
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
        name: 'Year 1800',
        data: [107, 31, 635, 203, 2]
    }, {
        name: 'Year 1900',
        data: [133, 156, 947, 408, 6]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 727, 31]
    }, {
        name: 'Year 2016',
        data: [1216, 1001, 4436, 738, 40]
    }]
});

var chartLokasi = Highcharts.chart('chartLokasi', {
    chart: {
        type: 'bar',
        scrollablePlotArea: {
            minWidth:600 ,
            scrollPositionX: 1
        }
    },
    responsive:{
            // rules:[{
            //     chartOptions:undefined
            //     condition:{
            //           callback:undefined
            //           maxHeight:undefined
            //           maxWidth:100
            //           minHeight:0
            //           minWidth:70
            //     }
            // }]
    },
    title: {
        text: 'Historic World Population by Region',
        align:'left'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
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
        name: 'Year 1800',
        data: [107, 31, 635, 203, 2]
    }, {
        name: 'Year 1900',
        data: [133, 156, 947, 408, 6]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 727, 31]
    }, {
        name: 'Year 2016',
        data: [1216, 1001, 4436, 738, 40]
    }]
});

var chartStatus = Highcharts.chart('chartStatus', {
    chart: {
        type: 'pie',
        scrollablePlotArea: {
            minWidth:600 ,
            scrollPositionX: 1
        }
    },
    responsive:{
            // rules:[{
            //     chartOptions:undefined
            //     condition:{
            //           callback:undefined
            //           maxHeight:undefined
            //           maxWidth:100
            //           minHeight:0
            //           minWidth:70
            //     }
            // }]
    },
    title: {
        text: 'Historic World Population by Region',
        align:'left'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
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
        name: 'Year 1800',
        data: [107, 31, 635, 203, 2]
    }, {
        name: 'Year 1900',
        data: [133, 156, 947, 408, 6]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 727, 31]
    }, {
        name: 'Year 2016',
        data: [1216, 1001, 4436, 738, 40]
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
