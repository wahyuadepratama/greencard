<!-- menu sidebar -->
@section('sidebar')
<a href="{{ url('/user/home') }}" class="{{ request()->is('user/home') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-home"></i> Home</a>
<a href="{{ url('/user/lapor') }}" class="{{ request()->is('user/lapor') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-volume-up"></i> Lapor Bahaya</a>
<a href="{{ url('/user/riwayat') }}" class="{{ request()->is('user/riwayat') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-history"></i> Riwayat pelaporan</a>
<a href="{{ url('/user/statistik') }}" class="{{ request()->is('user/statistik') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-bar-chart"></i> Statistik</a>
<a href="{{ url('/user/summary') }}" class="{{ request()->is('user/summary') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light"><i class="fa fa-print"></i> Summary</a>
@endsection
<!-- end menu sidebar -->

@section('menu-collapse')
<li class="nav-item collap">
  <a class="{{ request()->is('user/home') ? 'active-btn' : '' }} nav-link" href="{{ url('/user/home') }}"><i class="fa fa-home"></i> Home</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('user/lapor') ? 'active-btn' : '' }} nav-link" href="{{ url('/user/lapor') }}"><i class="fa fa-volume-up"></i> Lapor Bahaya</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('user/riwayat') ? 'active-btn' : '' }} nav-link" href="{{ url('/user/riwayat') }}"><i class="fa fa-history"></i> Riwayat pelaporan</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('user/statistik') ? 'active-btn' : '' }} nav-link" href="{{ url('/user/statistik') }}"><i class="fa fa-bar-chart"></i> Statistik</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('user/summary') ? 'active-btn' : '' }} nav-link" href="{{ url('/user/summary') }}"><i class="fa fa-print"></i> Summary</a>
</li>
@endsection
