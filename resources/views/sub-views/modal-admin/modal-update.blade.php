<!-- Modal -->
<div class="modal fade" id="updateManPower" tabindex="-1" role="dialog" aria-labelledby="updateManPowerTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateManPower">Update Data Man Power</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/man-power/update') }}" method="post"> @csrf
          <table width="100%" class="form-add-man">
            <tr>
              <td><label for=""> Hak Akses</label></td>
              <td>
                <select id="updateRole" name="role" class="form-control">
                  <option value="3">User</option>
                  <option value="2">Verifikator</option>
                  <option value="1">Admin</option>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for=""> Nama</label></td>
              <td><input id="updateName" type="text" name="name" class="form-control"></td>
            </tr>
            <tr>              
              <td><input id="updateNik" type="hidden" name="nik" class="form-control"></td>
            </tr>
            <tr>
              <td>  <label for="">Jabatan</label></td>
              <td><input id="updatePosition" type="text" name="position" class="form-control"></td>
            </tr>
            <tr>
              <td>  <label for="">BRL/Level</label></td>
              <td><input id="updateBrl" type="text" name="brl" class="form-control"></td>
            </tr>
            <tr>
              <td><label for=""> Section</label></td>
              <td>
                <select id="updateSection" name="section" class="form-control">
                  @forelse($sections as $section)
                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                  @empty
                  @endforelse
                  <option value="other">Other</option>
                </select>
              </td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
