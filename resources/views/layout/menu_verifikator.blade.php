<!-- menu sidebar -->
@section('sidebar')
<a href="{{ url('/verifikator/home') }}" class="{{ request()->is('verifikator/home') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-home"></i> &nbsp;Home</a>
<a href="{{ url('/verifikator/lapor') }}" class="{{ request()->is('verifikator/lapor') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-volume-up"></i> &nbsp;Lapor Bahaya</a>
<a href="{{ url('/verifikator/riwayat') }}" class="{{ request()->is('verifikator/riwayat') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-history"></i> &nbsp;Riwayat pelaporan</a>
<a href="{{ url('/verifikator/statistik') }}" class="{{ request()->is('verifikator/statistik') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-bar-chart"></i> &nbsp;Statistik</a>
<a href="{{ url('/verifikator/greencard') }}" class="{{ request()->is('verifikator/greencard') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-credit-card-alt"> &nbsp;Data Greencard</a>
<a href="{{ url('/verifikator/summary') }}" class="{{ request()->is('verifikator/summary') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-print"></i> &nbsp;Summary</a>
@endsection
<!-- end menu sidebar -->

@section('menu-collapse')
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/home') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/home') }}"><i class="fa fa-home"></i> Home</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/lapor') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/lapor') }}"><i class="fa fa-volume-up"></i> Lapor Bahaya</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/riwayat') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/riwayat') }}"><i class="fa fa-history"></i> Riwayat pelaporan</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/statistik') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/statistik') }}"><i class="fa fa-bar-chart"></i> Statistik</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/greencard') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/greencard') }}"><i class="fa fa-credit-card-alt"></i> Data Greencard</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/summary') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/summary') }}"><i class="fa fa-print"></i> Summary</a>
</li>
@endsection
