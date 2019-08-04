<div class="" id="greencard-mobileview">
    <div id="open-status" class="tabcontent-mobile" style="border: 1px solid #ddd; border-top:0px;">
    <div class="row">
      <div class="col">
        <div class="form-inline float-left">
          <div class="form-inline">
            <label for="">Search: &nbsp;</label>
            <input type="search" class="form-control form-control-sm" id="myInput" onkeyup="searchTableRow()" >
          </div>
        </div>
      </div>
    </div>

   <div id="searchTable">
     @forelse($open as $mopen)
      <div class="container border pt-2 pb-2 mt-3">
        <table width="100%" class="table-mobileview" id="tabelku">
          <tr>
            <th>#{{ $mopen->id }}</th>
            <td class="text-right">{{ $mopen->date }}</td>
          </tr>
          <tr>
            <th>Lokasi</th>
            <td class="text-right">{{ $mopen->location }}</td>
          </tr>
          <tr>
            <th>Kategori Bahaya</th>
            <td class="text-right">{{ $mopen->danger_category }}</td>
          </tr>
        </table>
        <br>
        <div class="form-inline float right">
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" onclick="loadModal({{ $mopen->id }})">
            Detail
          </button>&nbsp;
          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#status"  onclick="changeStatus({{ $mopen->id }},'{{ $mopen->status }}')">
            {{ $mopen->status }}
          </button>
        </div>
      </div>
    @empty

    @endforelse
 </div>

  </div>
  <!-- END CONTENT TAB OPEN -->

  <!-- CONTENT TAB CLOSE -->

  <div id="close-status" class="tabcontent-mobile" style="border: 1px solid #ddd; border-top:0px;">
    <div class="row">
      <div class="col">
        <div class="form-inline float-left">
          <div class="form-inline">
            <label for="">Search: &nbsp;</label>
            <input type="search" class="form-control form-control-sm" placeholder="" id="myInputClose" onkeyup="searchTableRowClose()">
          </div>
        </div>
      </div>
    </div>
    <div id="searchTableClose">
        @forelse($close as $mclose)
          <div class="container border m-2 p-3">
            <table width="100%" class="table-mobileview">
              <tr>
                <td>#{{ $mclose->id }}</td>
                <td class="text-right">{{ $mclose->date }}</td>
              </tr>
              <tr>
                <td>Lokasi</td>
                <td class="text-right">{{ $mclose->location }}</td>
              </tr>
              <tr>
                <td>Kategori Bahaya</td>
                <td class="text-right">{{ $mclose->danger_category }}</td>
              </tr>
              <tr>
                <td colspan="2">
                  <br>
                  <div class="form-inline float-right">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" onclick="loadModal({{ $mclose->id }})">
                      Detail
                    </button>&nbsp;
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#status"  onclick="changeStatus({{ $mclose->id }},'{{ $mclose->status }}')">
                      {{ $mclose->status }}
                    </button>
                  </div>
                </td>
              </tr>
            </table>
            <br>
          </div>
          @empty
          @endforelse
    </div>
  </div>
    <!-- END CONTEN TAB CLOSE -->

</div>
