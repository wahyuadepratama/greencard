@extends('layout.master')

@include('layout.menu_admin')

@section('content')

<div class="container " id="history-report">
<div class="clearfix">
  <div class="section-year form-inline">
    <div class="section form-group">
      <label for="">Section &nbsp;</label>
      <select class="form-control " >
        <option>Business</option>
        <option>Unit</option>
        <option>Produksi</option>
        <option>Engineering</option>
        <option>Plant</option>
        <option>MCD</option>
        <option>PSCM</option>
        <option>LC&D</option>
        <option>SHE</option>
        <option>BE</option>
        <option>GS</option>
        <option>HR</option>
        <option>IER</option>
        <option>Finance</option>
        <option>IT</option>
        <option>Other</option>
      </select>
    </div>
    <div class="year" style="margin-left:10px;">
      <select class="form-control" >
        <option> 2019</option>
        <option value="">2020</option>
        <option value="">2021</option>
        <option value="">2022</option>
      </select>
    </div>
  </div>
</div>
  <ul class="nav nav-tabs" id="tabs-history">
    <li class="nav-item">
      <a class="nav-link active" href="#" onclick="openCity(event,'open-status')">Open</a>
    </li>
    <li class="nav-item" >
      <a class="nav-link" href="#" onclick="openCity(event,'close-status')">Close</a>
    </li>
  </ul>

  <div class="" id="greencard-webview">
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
            <tr>
              <th scope="row">1</th>
              <td>Wahyu</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                  Detail
                </button>
              </td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#status">
                Open
              </button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Yola</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                  Detail
                </button>
              </td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#status">
                Open
              </button>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                  Detail
                </button>
              </td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#status">
                Open
              </button>
              </td>
            </tr>
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
              <tr>
                <th scope="row">1</th>
                <td>Wahyu</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                    Detail
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#status">
                  Open
                </button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Yola</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                    Detail
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#status">
                  Open
                </button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                    Detail
                  </button>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#status">
                  Open
                </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- END CONTEN TAB CLOSE -->
  </div>
 @include('mobile-views.admin.greencard')
</div>

@endsection

@include('sub-views.modal-detail')

@include('sub-views.modal-status')
