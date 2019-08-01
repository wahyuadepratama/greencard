<div class="" id="greencard-mobileview">
    <div id="open-status" class="tabcontent-mobile" style="border: 1px solid #ddd; border-top:0px;">
    <div class="row">
      <div class="col">
        <div class="form-inline">
          <label for="">Show &nbsp;</label>
            <select class="custom-select custom-select-sm form-control form-control-sm" onchange="showSomeData()"id="showData">
              <option value="5">5</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
        </div>
      </div>
      <div class="col">
        <div class="form-inline float-right">
          <div class="form-inline">
            <label for="">Search: &nbsp;</label>
            <input type="search" class="form-control form-control-sm" id="myInput" onkeyup="searchTableRow()" >
          </div>
        </div>
      </div>
    </div>

   <div id="searchTable">
      <div class="container border pt-2 pb-2 mt-3">
        <table width="100%" class="table-mobileview" id="tabelku">
          <tr>
            <th>#1</th>
            <td class="text-right">12 November 2019</td>
          </tr>
          <tr>
            <th>Lokasi</th>
            <td class="text-right">Area tambang</td>
          </tr>
          <tr>
            <th>Kategori Bahaya</th>
            <td class="text-right">Tindakan Tidak Aman</td>
          </tr>
        </table>
        <br>
        <div class="form-inline">
          <button type="button" name="button" class="btn btn-primary"  data-toggle="modal" data-target="#detail">Detail</button>
          <button type="button" name="button" class="btn btn-primary ml-2">Open</button>
        </div>
      </div>

      <div class="container border pt-2 pb-2 mt-3">
        <table width="100%" class="table-mobileview">
          <tr>
            <th>#1</th>
            <td class="text-right">13 November 2019</td>
          </tr>
          <tr>
            <th>Lokasi</th>
            <td class="text-right">Area tambang</td>
          </tr>
          <tr>
            <th>Kategori Bahaya</th>
            <td class="text-right">Tindakan Tidak Aman</td>
          </tr>

        </table>
        <br>
        <div class="form-inline">
          <button type="button" name="button" class="btn btn-primary"  data-toggle="modal" data-target="#detail">Detail</button>
          <button type="button" name="button" class="btn btn-primary ml-2">Open</button>
        </div>
    </div>

      <div class="container border pt-2 pb-2 mt-3">
        <table width="100%" class="table-mobileview">
          <tr>
            <th>#1</th>
            <td class="text-right">18 November 2019</td>
          </tr>
          <tr>
            <th>Lokasi</th>
            <td class="text-right">Area tambang</td>
          </tr>
          <tr>
            <th>Kategori Bahaya</th>
            <td class="text-right">Tindakan Tidak Aman</td>
          </tr>

        </table>
        <br>
        <div class="form-inline">
          <button type="button" name="button" class="btn btn-primary"  data-toggle="modal" data-target="#detail">Detail</button>
          <button type="button" name="button" class="btn btn-primary ml-2">Open</button>
        </div>
    </div>

      <div class="container border pt-2 pb-2 mt-3">
        <table width="100%" class="table-mobileview">
          <tr>
            <th>#1</th>
            <td class="text-right">20 November 2019</td>
          </tr>
          <tr>
            <th>Lokasi</th>
            <td class="text-right">Area tambang</td>
          </tr>
          <tr>
            <th>Kategori Bahaya</th>
            <td class="text-right">Tindakan Tidak Aman</td>
          </tr>
        </table>
        <br>
        <div class="form-inline">
            <button type="button" name="button" class="btn btn-primary"  data-toggle="modal" data-target="#detail">Detail</button>
            <button type="button" name="button" class="btn btn-primary ml-2">Open</button>
        </div>
    </div>
 </div>

  </div>
  <!-- END CONTENT TAB OPEN -->

  <!-- CONTENT TAB CLOSE -->

  <div id="close-status" class="tabcontent-mobile" style="border: 1px solid #ddd; border-top:0px;">
    <div class="row">
      <div class="col">
        <div class="form-inline">
          <label for="">Show &nbsp;</label>
            <select class="custom-select custom-select-sm form-control form-control-sm" name="">
              <option value="">10</option>
              <option value="">25</option>
              <option value="">50</option>
              <option value="">100</option>
            </select>
        </div>
      </div>
      <div class="col">
        <div class="form-inline float-right">
          <div class="form-inline">
            <label for="">Search: &nbsp;</label>
            <input type="search" class="form-control form-control-sm" placeholder="" id="myInputClose" onkeyup="searchTableRowClose()">
          </div>
        </div>
      </div>
    </div>
<div id="searchTableClose">
      <div class="container border m-2 p-4">
        <table width="100%" class="table-mobileview">
          <tr>
            <td>#1</td>
            <td class="text-right">17 November 2019</td>
          </tr>
          <tr>
            <td>Lokasi</td>
            <td class="text-right">Area tambang</td>
          </tr>
          <tr>
            <td>Kategori Bahaya</td>
            <td class="text-right">Tindakan Tidak Aman</td>
          </tr>
          <tr>
            <td colspan="2">
              <br>
              <div class="form-inline float-right">
                <button type="button" name="button" class="btn btn-primary">Detail</button>
                <button type="button" name="button" class="btn btn-primary ml-2">Open</button>
              </div>
            </td>
          </tr>
        </table>
        <br>
      </div>

      <div class="container border m-2 p-4">
        <table width="100%" class="table-mobileview">
          <tr>
            <td>#2</td>
            <td class="text-right">12 November 2019</td>
          </tr>
          <tr>
            <td>Lokasi</td>
            <td class="text-right">Area tambang</td>
          </tr>
          <tr>
            <td>Kategori Bahaya</td>
            <td class="text-right">Tindakan Tidak Aman</td>
          </tr>
          <tr>
            <td colspan="2">
              <br>
              <div class="form-inline float-right">
                <button type="button" name="button" class="btn btn-primary">Detail</button>
                <button type="button" name="button" class="btn btn-primary ml-2">Open</button>
              </div>
            </td>
          </tr>
        </table>
        <br>
      </div>

      <div class="container border m-2 p-4">
        <table width="100%" class="table-mobileview">
          <tr>
            <td>#3</td>
            <td class="text-right">12 November 2019</td>
          </tr>
          <tr>
            <td>Lokasi</td>
            <td class="text-right">Area tambang</td>
          </tr>
          <tr>
            <td>Kategori Bahaya</td>
            <td class="text-right">Tindakan Tidak Aman</td>
          </tr>
          <tr>
            <td colspan="2">
              <br>
              <div class="form-inline float-right">
                <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">Detail</button>
                <button type="button" name="button" class="btn btn-primary ml-2">Open</button>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
    <!-- END CONTEN TAB CLOSE -->

</div>
