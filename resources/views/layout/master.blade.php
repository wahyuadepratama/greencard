@extends('layout.head')

@section('title','Home')

@section('content-layout')
<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
      <center><img src="{{asset('img/logo.jpg')}}" alt="" class="img-logo-sidebar"></center>
    </div>
    <div class="list-group list-group-flush" id="sidebar-menu">
      <!-- Menu sidebar -->
      @yield('sidebar')
      <!-- end menu -->
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

      <ul class="ml-auto mt-0 mb-0 mr-2 mt-lg-0">
        <li class="nav-item clearfix dropdown" id="box-user-name">
          <a class="nav-link dropdown-toggle" href="#"role="button" data-toggle="dropdown">
            <img src="{{asset('img/reza.jpg')}}" alt="" class="rounded-circle" height="30px" width="30px"></a>
            <div class="dropdown-menu dropdown-menu-right" >
              <a class="dropdown-item" href="#">{{ session('login')->name }}</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">{{ session('login')->section->name }} ({{ session('login')->role->name }})</a>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item clearfix dropdown" id="user-name-one">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="margin-right:10px" >Welcome, {{ session('login')->name }} </span>
              <img src="{{asset('img/reza.jpg')}}" alt="" class="rounded-circle"  height="30px" width="30px"></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Akun {{ session('login')->role->name }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">{{ session('login')->section->name }} ({{ session('login')->nik }})</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
          </li>
          @yield('menu-collapse')
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      @yield('content')
    </div>

  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->



@endsection
