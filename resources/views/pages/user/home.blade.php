@extends('layout.master')

@include('layout.menu_user')

@section('content')
<!-- content home -->
  <div class="container" >
    <br>
    <div class="row" id="card-wrapper">
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/user/lapor') }}'">
            <h5 class="card-title">
            <span><i class="fa fa-volume-up" style="font-size:30px;color:red"></i></span>
            <span style="margin-left:10px">Laporan Bahaya</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/user/riwayat') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-history" style="font-size:30px;color:orange"></i></span>
              <span style="margin-left:10px">Riwayat Pelaporan</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/user/statistik') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-bar-chart" style="font-size:30px;color:#ff87cb"></i></span>
            <span style="margin-left:10px">Statistik</span>
           </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/user/summary') }}'">
            <h5 class="card-title">
              <span><i class="fa fa-print" style="font-size:30px;color:#18bad9"></i></span>
            <span style="margin-left:10px">Summary</span>
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
            <th colspan="4" class="text-center">Top 10 Rank</th>
          </tr>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Section</th>
            <th scope="col">GC</th>
          </tr>
        </thead>
        <tbody>
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

<!-- end content home -->
@endsection
