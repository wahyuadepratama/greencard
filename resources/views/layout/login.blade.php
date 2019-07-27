@extends('layout.head')

@section('content-layout')
<div class="container-fluid login d-flex justify-content-center">
  <div class="container login ">
    <img src="{{ asset('img/logo.jpg')}}" alt="logo" >
    @yield('content')
  </div>
</div>

@endsection
