@extends('layout.head')

@section('content-layout')
<style media="screen">

  button.btn-primary:hover{
  background-color: #11ab51;
  }
  ::-webkit-input-placeholder { /* Edge */
    color: #18161b7d !important;
  }

  :-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #18161b7d !important;
  }

  ::placeholder {
    color: #18161b7d !important;
  }
</style>
<div class="container-fluid login d-flex justify-content-center" id="wrapper-login">
  <div class="background-image clearfix">
    <img src="{{ asset('../../img/buma.jpeg')}}" alt="" class="img-responsive float-right" height="30px" style="margin-right:15px;margin-top:15px">
  </div>
  <div class="container login">
    <center><img src="{{ asset('img/logo.jpg')}}" alt="logo" class="img-responsive" width="150"></center>
    <br>
    @yield('content')
  </div>
</div>

@endsection
