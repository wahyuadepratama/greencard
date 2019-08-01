<!-- Modal -->
<div class="modal fade" id="addManPower" tabindex="-1" role="dialog" aria-labelledby="addManPowerTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addManPower">Tambah Data Man Power</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="index.html" method="post">
          <table width="100%" class="form-add-man">
            <tr>
              <td><label for=""> Nama</label></td>
              <td><input type="text" name="" value="" class="form-control"></td>
            </tr>
            <tr>
              <td><label for=""> NIK</label></td>
              <td><input type="text" name="" value="" class="form-control"></td>
            </tr>
            <tr>
              <td>  <label for="">Jabatan</label></td>
              <td><input type="text" name="" value="" class="form-control"></td>
            </tr>
            <tr>
              <td><label for=""> Section</label></td>
              <td> <select class="form-control" onchange="showInputSection(this)">
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
                  <option value="other">Other</option>
                </select>
                <input type="input" class="form-control" placeholder="Ketik disini" style="display:none;" id="other-section-input">
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
