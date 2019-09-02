@extends('layout.master')

@include('layout.menu_admin')

@section('content')

<div class="container " id="history-report">

  <div class="clearfix">
    <div class="section-year form-inline">
      <div class="section form-group">
        <label for="">Section &nbsp;</label>
        <select class="form-control" id="sectionOptionOpen" onchange="searchSectionData()">
          @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="year" style="margin-left:10px;">
        <select class="form-control" id="sectionOptionYear" onchange="searchSectionData()">
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
        </select>
      </div>
    </div>
  </div>
  <br>
  @if (session('success'))
    <br><br><small>
      <div class="alert alert-success"> {{ session('success') }} </div>
    </small>
  @endif
  <ul class="nav nav-tabs" id="tabs-history">
    <li class="nav-item">
      <a class="nav-link active" href="#" onclick="openCity(event,'open-status')">Open</a>
    </li>
    <li class="nav-item" >
      <a class="nav-link" href="#" onclick="openCity(event,'close-status')">Close</a>
    </li>
  </ul>

<div id="greencard-webview">
  <!-- CONTENT TAB OPEN -->
  <div id="open-status" class="tabcontent" style="border: 1px solid #ddd; border-top:0px;">
    <div class="table-responsive">
      <table id="open-table-data" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Kategori Bahaya</th>
            <th scope="col">Detail</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse($open as $mOpen)
          <tr>
            <th scope="row">{{ $mOpen->id }}</th>
            <td>{{ $mOpen->date }}</td>
            <td>{{ $mOpen->location }}</td>
            <td>{{ $mOpen->danger_category }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail"
                onclick="loadModal({{ $mOpen->id }})"> Detail
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#status" onclick="changeStatus({{ $mOpen->id }},'{{ $mOpen->status }}')">
                {{ $mOpen->status }}
              </button>
            </td>
          </tr>
          @empty

          @endforelse
        </tbody>
    </table>
      </div>
  </div>
  <!-- END CONTENT TAB OPEN -->

  <!-- CONTENT TAB CLOSE -->
  <div id="close-status" class="tabcontent" style="border: 1px solid #ddd; border-top:0px;">
    <div class="table-responsive">
        <table id="close-table-data" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Kategori Bahaya</th>
              <th scope="col">Detail</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($close as $mClose)
            <tr>
              <th scope="row">{{ $mClose->id }}</th>
              <td>{{ $mClose->date }}</td>
              <td>{{ $mClose->location }}</td>
              <td>{{ $mClose->danger_category }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" onclick="loadModal({{ $mClose->id }})">
                  Detail
                </button>
              </td>
              <td>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#status" onclick="changeStatus({{ $mClose->id }},'{{ $mClose->status }}')">
                {{ $mClose->status }}
              </button>
              </td>
            </tr>
            @empty
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <!-- END CONTEN TAB CLOSE -->
    </div>
    @include('mobile-views.admin.greencard')
</div>
@endsection

@include('sub-views.modal-admin.modal-detail')

@include('sub-views.modal-admin.modal-status')

@section('js-ajax')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">

    function searchSectionData(){
      var sectionChoose = document.getElementById('sectionOptionOpen').value;
      var sectionYear = document.getElementById('sectionOptionYear').value;
        swal({
          text: "Please waiting...",
          buttons: false,
          timer: 3000
        });

      $.ajax({ /* THEN THE AJAX CALL */
        url: "/greencard/open/data/search",
        method : "POST",
        data:{'section':sectionChoose, 'year': sectionYear, _token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          $('#open-table-data').dataTable().fnClearTable();
          $('#open-table-data').DataTable().destroy();
          $('#open-table-data').find('tbody').append(data);
          $('#open-table-data').DataTable().draw();
        }
      });

      $.ajax({ /* THEN THE AJAX CALL */
        url: "/greencard/close/data/search",
        method : "POST",
        data:{'section':sectionChoose, 'year': sectionYear, _token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          $('#close-table-data').dataTable().fnClearTable();
          $('#close-table-data').DataTable().destroy();
          $('#close-table-data').find('tbody').append(data);
          $('#close-table-data').DataTable().draw();
        }
      });

      $.ajax({ /* THEN THE AJAX CALL */
        url: "/greencard/open/data/mobile/search",
        method : "POST",
        data:{'section':sectionChoose, 'year': sectionYear, _token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          $('#searchTable').html(data);
        }
      });

      $.ajax({ /* THEN THE AJAX CALL */
        url: "/greencard/close/data/mobile/search",
        method : "POST",
        data:{'section':sectionChoose, 'year': sectionYear, _token: '{{csrf_token()}}'},
        async : true,
        dataType : 'text',
        success: function(data){
          $('#searchTableClose').html(data);
        }
      });
    }

    function loadModal(id) {
      $.ajax({ /* THEN THE AJAX CALL */
          url: "/section/modal",
          method : "POST",
          data:{'id':id, _token: '{{csrf_token()}}'},
          async : true,
          success: function(data){
            $('#modalStatus').html(data[0]['status']);
            if (data[0]['status'] == 'Close') {
              $('#modalStatus').attr('class', 'text-danger');
            }else{
              $('#modalStatus').attr('class', 'text-success');
            }
            $('#modalDestroy').attr('href', '/greencard/report/destroy'+'/'+data[0]['id']);
            $('#modalUpdate').attr('action', '/greencard/report/update'+'/'+data[0]['id']);
            $('#modalId').html(data[0]['id']);
            $('#modalPelapor').html(data[0]['name']);
            $('#modalSection').html(data[0]['section']);
            $('#modalBrl').html(data[0]['brl']);
            $('#modalTanggal').val(data[0]['date']);
            $('#modalWaktu').val(data[0]['time']);
            $('#modalLokasi').val(data[0]['location']);
            $('#modalDetailLokasi').val(data[0]['detail_location']);
            $('#modalKategoriBahaya').val(data[0]['danger_category']);
            $('#modalDeskripsiBahaya').val(data[0]['description']);
            $('#modalRisiko').val(data[0]['risk']);
            $('#modalKodeBahaya').val(data[0]['danger_code']);
            $('#modalTindakanPerbaikan').val(data[0]['action']);
            $('#modalPic').val(data[0]['pics']);
          }
        });//end ajax
      } //end function

      function changeStatus(id, status) {
        $('#statId').html(id);
        if (status == "Open") {
          $('#statName').html("Close");
        }else{
          $('#statName').html("Open");
        }
        $('#statHref').attr('onclick', 'storeNewStatus("'+ id +'", "'+ status +'")');
      }

      function storeNewStatus(id, status){
        $.ajax({ /* THEN THE AJAX CALL */
          url: "/greencard/change-status",
          method : "POST",
          data:{'id': id, 'status': status, _token: '{{csrf_token()}}'},
          async : true,
          dataType : 'text',
          success: function(data){
            swal({
              icon: "success",
              text: "Perubahan berhasil dilakukan",
              buttons: false,
              timer: 2000
            });
          }
        });
        searchSectionData();
      }

      $( function() {
        // $( "#modalTanggal" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
        // $( "#modalWaktu" ).timepicker({ 'timeFormat': 'h:i:s' });
      } );

  </script>
@endsection
