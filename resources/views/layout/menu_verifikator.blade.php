<!-- menu sidebar -->
@section('sidebar')
<a href="{{ url('/verifikator/home') }}" class="{{ request()->is('verifikator/home') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Home</a>
<a href="{{ url('/verifikator/lapor') }}" class="{{ request()->is('verifikator/lapor') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Lapor Bahaya</a>
<a href="{{ url('/verifikator/riwayat') }}" class="{{ request()->is('verifikator/riwayat') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Riwayat pelaporan</a>
<a href="{{ url('/verifikator/statistik') }}" class="{{ request()->is('verifikator/statistik') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Statistik</a>
<a href="{{ url('/verifikator/greencard') }}" class="{{ request()->is('verifikator/greencard') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Data Greencard</a>
<a href="{{ url('/verifikator/summary') }}" class="{{ request()->is('verifikator/summary') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Summary</a>
@endsection
<!-- end menu sidebar -->

@section('menu-collapse')
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/home') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/home') }}">Home</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/lapor') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/lapor') }}">Lapor Bahaya</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/riwayat') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/riwayat') }}">Riwayat pelaporan</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/statistik') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/statistik') }}">Statistik</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/greencard') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/greencard') }}">Data Greencard</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('verifikator/summary') ? 'active-btn' : '' }} nav-link" href="{{ url('/verifikator/summary') }}">Summary</a>
</li>
@endsection
