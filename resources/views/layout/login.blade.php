@extends('layout.head')

@section('content-layout')
<div class="container-fluid login d-flex justify-content-center" id="wrapper-login">
  <div class="container login">
    <center><img src="{{ asset('img/logo.jpg')}}" alt="logo" class="img-responsive" width="150"></center>
    <br>
    @yield('content')
  </div>
</div>

@endsection
