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
          <canvas id="chartPencapaian" width="400" height="200"></canvas>
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
        <canvas id="chartKta" width="400" height="100"></canvas>
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
            <canvas id="chartLokasi" width="400" height="100"></canvas>
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

        <canvas id="chartStatus" width="400" height="100"></canvas>

        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- END COLLAPSE -->
</div>
@endsection

@section('js-chart')
<script>
var ctx = document.getElementById('chartPencapaian').getContext('2d');
var ctx2 = document.getElementById('chartKta').getContext('2d');
var ctx3 = document.getElementById('chartLokasi').getContext('2d');
var ctx4 = document.getElementById('chartStatus').getContext('2d');
var chartPencapaian = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: [@php foreach ($reports as $report) {
          $x = \App\Models\Section::where('id', $report->section_id)->first();
          echo '"'. $x->name . '",';
        } @endphp],
        datasets: [{
            label: '# Man Power in Section: ',
            data: [@php foreach ($reports as $report) {
              echo '"'. $report->section_count . '",';
            } @endphp],
            backgroundColor: [@php foreach ($reports as $report) {
              echo "'".'rgba(255, 99, 132, 0.2)'."',";
            } @endphp],
            borderColor: [@php foreach ($reports as $report) {
              echo "'".'rgba(255, 99, 132, 0.2)'."',";
            } @endphp],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var chartKta = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Kondisi Tidak Aman', 'Tindakan Tidak Aman'],
        datasets: [{
            label: '# Total',
            data: [{{ $kta }}, {{ $tta }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    }
});

var chartLokasi = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ['Office', 'Warehouse', 'Workshop', 'Area Tambang (OB)', 'Area Tambang (Coal)', 'Area Mess', 'Pit Stop / Shutdown', 'Area Lainnya'],
        datasets: [{
            label: '# Man power at this location',
            data: [{{ $gk->office }}, {{ $gk->warehouse }}, {{ $gk->workshop }}, {{ $gk->tambang_ob }}, {{ $gk->tambang_coal }}, {{ $gk->mess }}, {{ $gk->pit_stop }}, {{ $gk->area_lainnya }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(190, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(190, 159, 64, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var chartStatus = new Chart(ctx4, {
  type: 'pie',
  data: {
      labels: ['Open', 'Close'],
      datasets: [{
          label: '# Total',
          data: [{{ $open }}, {{ $close }}],
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)'
          ],
          borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 1
      }]
  },
  options: {
        legendCallback: function(chart) {
            "<h5>testestes</h5>";
        }
    }
});

</script>
@endsection
