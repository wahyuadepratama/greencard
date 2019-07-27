@extends('layout.master')

@include('layout.menu_user')

@section('content')

<div class="container">
  <div class="border p-4 mt-4">
      <p>Download data pelaporan all section</p>
      <div class="row">
        <div class="col-sm-3">
            <button type="button" name="button" class="form-control btn btn-primary">Download PDF</button>
        </div>
        <div class="col-sm-3">
          <button type="button" name="button" class="form-control btn btn-primary">Download Excel</button>
        </div>
      </div>
  </div>
</div>


@endsection
