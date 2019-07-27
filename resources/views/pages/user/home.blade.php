@extends('layout.master')

@include('layout.menu_user')

@section('content')
<!-- content home -->
  <div class="container" >
    <br>
    <div class="row" id="card-wrapper">
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
            <img src="{{asset('svg/folder-open.svg')}}" alt="">
            <span style="margin-left:10px">Laporan Bahaya</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><img src="{{asset('svg/history.svg')}}" alt="">
              <span style="margin-left:10px">Riwayat Pelaporan</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><img src="{{asset('svg/stats-bars.svg')}}" alt="">
            <span style="margin-left:10px">Statistik</span>
           </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><img src="{{asset('svg/database.svg')}}" alt="">
            <span style="margin-left:10px">Summary</span>
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
        <th scope="col">Top 10 Rank</th>
        <th scope="col">Section</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
    </div>
  </div>

<!-- end content home -->
@endsection
