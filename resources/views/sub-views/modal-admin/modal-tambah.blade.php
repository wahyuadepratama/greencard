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
        <form action="{{ url('/admin/man-power/store') }}" method="post"> @csrf
          <table width="100%" class="form-add-man">
            <tr>
              <td><label for=""> Hak Akses</label></td>
              <td>
                <select name="role" class="form-control">
                  <option value="3">User</option>
                  <option value="2">Verifikator</option>
                  <option value="1">Admin</option>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for=""> Nama</label></td>
              <td><input type="text" name="name" value="{{ old('name') }}" class="form-control"></td>
            </tr>
            <tr>
              <td><label for=""> NIK</label></td>
              <td><input type="text" name="nik" value="{{ old('nik') }}" class="form-control"></td>
            </tr>
            <tr>
              <td>  <label for="">Jabatan</label></td>
              <td><input type="text" name="position" value="{{ old('position') }}" class="form-control"></td>
            </tr>
            <tr>
              <td>  <label for="">BRL/Level</label></td>
              <td><input type="text" name="brl" value="{{ old('brl') }}" placeholder="1 / 2 / 3 / 4 / 5 / 6 / Vendor / Other" class="form-control"></td>
            </tr>
            <tr>
              <td><label for=""> Section</label></td>
              <td>
                <select name="section" class="form-control" onchange="showInputSection(this)">
                  @forelse($sections as $section)
                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                  @empty
                  @endforelse
                  <option value="other">Other</option>
                </select>
                <input type="input" class="form-control" name="other" placeholder="Ketik nama section disini" style="display:none; margin-top: 5px" id="other-section-input">
              </td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
