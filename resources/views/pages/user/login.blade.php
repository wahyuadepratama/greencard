@extends('layout.login')

@section('title','Login User')

@section('content')
<form>
  <div class="form-group">
    <input type="input" class="form-control" id="nik" placeholder="NIK">
  </div>
  <button type="submit" class="form-control btn btn-primary">Masuk</button>
</form>
@endsection
