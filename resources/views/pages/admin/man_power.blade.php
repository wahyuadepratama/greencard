@extends('layout.master')

@include('layout.menu_admin')

@section('content')

<div class="container " id="history-report">
  <div class="clearfix">
    <button type="button" name="button" class="form-control float-right" style="width:200px;" data-toggle="modal" data-target="#addManPower"><i class="fa fa-plus"></i> Man Power</button>
  </div>
  <br>

  @if ($errors->any())
  <br><small>
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
  </small>
  @endif

  @if (session('success'))
    <br><small>
      <div class="alert alert-success"> {{ session('success') }} </div>
    </small>
  @endif

<div id="greencard-webview">
  <button type="button" onclick="loadAllData()" class="btn btn-sm btn-primary float-left" style="margin: 20px" name="button">Load All Data <i class="fa fa-refresh fa-spin fa-fw"></i></button>
  <!-- CONTENT TAB OPEN -->
  <div id="open-status" class="tabcontent border">
    <div class="table-responsive">
      <table id="open-table-data" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Role</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Section</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no=1 @endphp
          @forelse($manPowers as $manPower)
          <tr>
            <th>{{ $no }}</th>
            <th scope="row">{{ $manPower->role->name }}</th>
            <td>{{ $manPower->name }}</td>
            <td>{{ $manPower->nik }}</td>
            <td>{{ $manPower->position }}</td>
            <td>{{ $manPower->section->name }}</td>
            <td>
              <div class="form-inline">
                <button type="button" class="form-control btn btn-sm btn-primary" data-toggle="modal" data-target="#updateManPower"
                onclick="showModaluUpdate('{{ $manPower->nik }}', '{{ $manPower->name }}', '{{ $manPower->position }}', '{{ $manPower->section_id }}', '{{ $manPower->brl }}', '{{ $manPower->role_id }}')">
                  Update
                </button><br><br>
                <button type="button" class="form-control  btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteManPower" onclick="showModalDestroy({{ $manPower->nik }}, '{{ $manPower->name }}')">
                  Delete
              </button>
              </div>
            </td>
          </tr>
          @php $no++ @endphp
          @empty
          @endforelse
        </tbody>
    </table>
      </div>
  </div>
  <!-- END CONTENT TAB OPEN -->
</div>

@include('mobile-views.admin.man_power')
</div>
@endsection

@include('sub-views.modal-admin.modal-delete')
@include('sub-views.modal-admin.modal-tambah')
@include('sub-views.modal-admin.modal-update')

@section('js-ajax')
  <script type="text/javascript">

    var input = document.getElementById("searchOnMobile");
    input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
     event.preventDefault();
     if (input.value == "") {
       input.value = '900';
     }
     window.location.href = "/admin/man-power/search/"+ input.value;
    }
    });

    function loadAllData() {
      swal({
        text: "Process All Data! Please Waiting...",
        buttons: false
      });

      $.ajax({ /* THEN THE AJAX CALL */
        url: "/admin/man-power/load-all-data",
        method : "POST",
        data:{_token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          $('#open-table-data').dataTable().fnClearTable();
          $('#open-table-data').DataTable().destroy();
          $('#open-table-data').find('tbody').append(data);
          $('#open-table-data').DataTable().draw();
          swal.stopLoading();
          swal.close();
        }
      });

      $.ajax({ /* THEN THE AJAX CALL */
        url: "/admin/man-power/load-all-data/mobile",
        method : "POST",
        data:{_token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          $('#searchTableMobile').html(data);
        }
      });
    }

    function showModaluUpdate(nik, name, position, section, brl, role) {
      $('#updateName').attr('value', name);
      $('#updateNik').attr('value', nik);
      $('#updatePosition').attr('value', position);
      $('#updateBrl').attr('value', brl);      
    }

    function showModalDestroy(id, name) {
      $('#mpName').html(name);
      $('#mpDelete').attr('onclick', 'destroyManPower("'+ id +'", "'+ name +'")');
    }

    function destroyManPower(id, name) {
      $.ajax({ /* THEN THE AJAX CALL */
        url: "/admin/man-power/destroy",
        method : "POST",
        data:{'id': id, _token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          swal({
            icon: "success",
            text: "Data berhasil dihapus",
            buttons: false,
            timer: 2000
          });
          loadAllData();
        }
      });
    }
  </script>
@endsection
