<!-- menu sidebar -->
@section('sidebar')
<a href="{{ url('/admin/home') }}" class="{{ request()->is('admin/home') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Home</a>
<a href="{{ url('/admin/lapor') }}" class="{{ request()->is('admin/lapor') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Lapor Bahaya</a>
<a href="{{ url('/admin/riwayat') }}" class="{{ request()->is('admin/riwayat') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Riwayat pelaporan</a>
<a href="{{ url('/admin/statistik') }}" class="{{ request()->is('admin/statistik') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Statistik</a>
<a href="{{ url('/admin/greencard') }}" class="{{ request()->is('admin/greencard') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Data Greencard</a>
<a href="{{ url('/admin/summary') }}" class="{{ request()->is('admin/summary') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Summary</a>
<a href="{{ url('/admin/man-power') }}" class="{{ request()->is('admin/man-power') ? 'active-btn' : '' }} list-group-item list-group-item-action bg-light">Data Man Power</a>
@endsection
<!-- end menu sidebar -->

@section('menu-collapse')
<li class="nav-item collap">
  <a class="{{ request()->is('admin/home') ? 'active-btn' : '' }} nav-link" href="{{ url('/admin/home') }}">Home</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('admin/lapor') ? 'active-btn' : '' }} nav-link" href="{{ url('/admin/lapor') }}">Lapor Bahaya</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('admin/riwayat') ? 'active-btn' : '' }} nav-link" href="{{ url('/admin/riwayat') }}">Riwayat pelaporan</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('admin/statistik') ? 'active-btn' : '' }} nav-link" href="{{ url('/admin/statistik') }}">Statistik</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('admin/greencard') ? 'active-btn' : '' }} nav-link" href="{{ url('/admin/greencard') }}">Data Greencard</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('admin/summary') ? 'active-btn' : '' }} nav-link" href="{{ url('/admin/summary') }}">Summary</a>
</li>
<li class="nav-item collap">
  <a class="{{ request()->is('admin/man-power') ? 'active-btn' : '' }} nav-link" href="{{ url('/admin/man-power') }}">Data Man Power</a>
</li>
@endsection
