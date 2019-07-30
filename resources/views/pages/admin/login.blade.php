@extends('layout.login')

@section('title','Login Admin')

@section('content')
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group">
    <input type="input" class="form-control" id="nik" placeholder="NIK Admin" name="nik" value="{{ old('nik') }}">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>
  @if ( session('error'))
    <small>
      <div class="alert alert-danger"> {{ session('error') }} </div>
    </small>
  @endif
  <button type="submit" class="form-control btn btn-primary">Masuk</button>
</form>
@endsection
