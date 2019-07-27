@extends('layout.master')

@include('layout.menu_admin')

@section('content')

<div class="container " id="history-report">
  <div class="clearfix">
    <button type="button" name="button" class="form-control float-right" style="width:200px;" data-toggle="modal" data-target="#addManPower"><i class="fa fa-plus"></i> Man Power</button>
  </div>
  <br>

  <!-- CONTENT TAB OPEN -->
  <div id="open-status" class="tabcontent border">
    <div class="table-responsive">
      <table id="open-table-data" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Section</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Yolanda Parawita</td>
            <td>Supervisor</td>
            <td>1511521013</td>
            <td>SHE</td>
            <td>
              <div class="form-inline">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateManPower">
                  Update
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteManPower">
                  Delete
              </button>
              </div>
            </td>
          </tr>
        </tbody>
    </table>
      </div>
  </div>
  <!-- END CONTENT TAB OPEN -->


</div>
@endsection

@include('sub-views.modal-admin.modal-delete')
@include('sub-views.modal-admin.modal-tambah')
@include('sub-views.modal-admin.modal-update')
