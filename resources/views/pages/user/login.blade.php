@extends('layout.login')

@section('title','Login User')

@section('content')
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group">
    <input type="input" class="form-control" id="nik" placeholder="NIK" name="nik" value="{{ old('nik') }}">
  </div>
    @if ( session('error'))
      <small>
        <div class="alert alert-danger"> {{ session('error') }} </div>
      </small>
    @endif
  <button type="submit" class="form-control btn btn-primary">Masuk</button>
</form>
@endsection
