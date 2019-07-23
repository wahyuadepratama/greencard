@extends('layout.login')

@section('title','Login Verifikator')

@section('content')
<form>
  <div class="form-group">
    <input type="input" class="form-control" id="nik" placeholder="NIK">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <button type="submit" class="form-control btn btn-primary">Masuk</button>
</form>
@endsection
