@extends('layout.master')

@include('layout.menu_admin')

@section('content')
<!-- content home -->
  <div class="container" >
    <br>
    <div class="row" id="card-wrapper">
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/lapor') }}'">
            <h5 class="card-title">
            <span><i class="fa fa-volume-up" style="font-size:30px;color:red"></i></span>
            <span style="margin-left:10px">Laporan Bahaya</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/riwayat') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-history" style="font-size:30px;color:orange"></i></span>
              <span style="margin-left:10px">Riwayat Pelaporan</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/statistik') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-bar-chart" style="font-size:30px;color:#ff87cb"></i></span>
            <span style="margin-left:10px">Statistik</span>
           </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/greencard') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-credit-card-alt" style="font-size:30px;color:lightgreen"></i></span>
            <span style="margin-left:10px">Data Greencard</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/summary') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-print" style="font-size:30px;color:#18bad9"></i></span>
            <span style="margin-left:10px">Summary</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/man-power') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-users" style="font-size:30px;color:#a269d9;"></i></span>
             <span style="margin-left:10px">Data Man Power</span>
            </h5>
          </div>
        </div>
      </div>
    </div>

    <br>
    <div id="rank-wrapper" class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th colspan="4">
              <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                  <select class="form-control" id="searchByMonth" onchange="searchByMonthYear()">
                    <option value="all">Semua Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Febuari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <select class="form-control" id="searchByYear" onchange="searchByMonthYear()">
                    <option value="all">Semua Tahun</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                  </select>
                </div>
              </div>
            </th>
          </tr>
          <tr>
            <th colspan="4" class="text-center">Top 10 Rank</th>
          </tr>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Section</th>
            <th scope="col">GC</th>
          </tr>
        </thead>
        <tbody id="topRankTable">
          @php $no = 1; @endphp
          @forelse($tops as $top)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $top->user->name }}</td>
              <td>{{ $top->user->section->name }}</td>
              <td>{{ $top->gc }}</td>
            </tr>
          @empty

          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <script type="text/javascript">

    function searchByMonthYear(){
      var month = $('#searchByMonth').val();
      var year = $('#searchByYear').val();

      swal({
        text: "Please waiting...",
        buttons: false,
        timer: 1000
      });
      
      $.ajax({ /* THEN THE AJAX CALL */
        url: "/admin/home/rank/update",
        method : "POST",
        data:{'month':month, 'year': year, _token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          $('#topRankTable').html(data);
        }
      });
    }

  </script>

<!-- end content home -->
@endsection
