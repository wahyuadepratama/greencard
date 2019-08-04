<div class="" id="greencard-mobileview">
    <div id="open-status" class="tabcontent-mobile border">
    <div class="row">
      <div class="col">
        <div class="form-inline float-right">
          <div class="form-inline">
            <label for="">Search {{ $input ?? "" }} : &nbsp;</label>
            <input type="search" class="form-control" placeholder="Cari nik atau nama disini.." id="searchOnMobile">
          </div>
        </div>
      </div>
    </div>
    <div id="searchTableMobile">
          @forelse($mobileManPowers as $manpower)
          <br><div class="container border p-4">
            <table width="100%" class="table-mobileview">
              <tr>
                <td>#{{ $manpower->nik }}</td>
                <td class="text-right">{{ $manpower->name }}</td>
              </tr>
              <tr>
                <td>Hak Akses</td>
                <td class="text-right">{{ $manpower->role->name }}</td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td class="text-right">{{ $manpower->position }}</td>
              </tr>
              <tr>
                <td>Section</td>
                <td class="text-right">{{ $manpower->section->name }}</td>
              </tr>
              <tr>
                <td colspan="2">
                  <br>
                  <div class="form-inline float-right">
                    <button type="button" name="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateManPower"
                    onclick="showModaluUpdate('{{ $manpower->nik }}', '{{ $manpower->name }}', '{{ $manpower->position }}', '{{ $manpower->section_id }}', '{{ $manpower->brl }}', '{{ $manpower->role_id }}')">
                    Update</button>
                    <button type="button" name="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#deleteManPower" onclick="showModalDestroy({{ $manpower->nik }}, '{{ $manpower->name }}')">
                      Delete</button>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          @empty
          @endforelse
    </div>
  </div><br>
  <center style="margin-bottom: 50px">
    <a href="{{ $mobileManPowers->previousPageUrl() }}" class="btn btn-sm btn-primary float-left">< Sebelumnya</a>
    <a href="{{ $mobileManPowers->nextPageUrl() }}" class="btn btn-sm btn-primary float-right">Selanjutnya ></a>
  </center>
  <!-- END CONTENT TAB OPEN -->


</div>
