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
            <img src="{{asset('svg/folder-open.svg')}}" alt="">
            <span style="margin-left:10px">Laporan Bahaya</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/riwayat') }}'">
            <h5 class="card-title"><img src="{{asset('svg/history.svg')}}" alt="">
              <span style="margin-left:10px">Riwayat Pelaporan</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/statistik') }}'">
            <h5 class="card-title"><img src="{{asset('svg/stats-bars.svg')}}" alt="">
            <span style="margin-left:10px">Statistik</span>
           </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/greencard') }}'">
            <h5 class="card-title"><img src="{{asset('svg/database.svg')}}" alt="">
            <span style="margin-left:10px">Data Greencard</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/summary') }}'">
            <h5 class="card-title"><img src="{{asset('svg/database.svg')}}" alt="">
            <span style="margin-left:10px">Summary</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body" onclick="window.location.href = '{{ url('/admin/man-power') }}'">
            <h5 class="card-title"><img src="{{asset('svg/database.svg')}}" alt="">
            <span style="margin-left:10px">Data Man Power</span>
            </h5>
          </div>
        </div>
      </div>

    </div>
<br>
    <div class="row" id="rank-wrapper">
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
          @php $no =1; @endphp
          @forelse($tops as $top)
            <tr>
              <th scope="row">{{ $no }}</th>
              <td>{{ $top->user->name }}</td>
              <td>{{ $top->user->section->name }}</td>
              <td>{{ $top->gc }}</td>
            </tr>
            @php $no++; @endphp
          @empty

          @endforelse
        </tbody>
  </table>
    </div>
  </div>

<!-- end content home -->
@endsection
