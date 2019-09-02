<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailTitle" aria-hidden="true">
  <form action="" id="modalUpdate" method="post">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="clearfix">
          <h5 class="modal-title" id="detailTitle">Detail Laporan</h5>
        </div>

      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-responsive-stack"  id="tableOne">
               <thead class="thead-dark">
                  <tr>
                     <th></th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                 <tr>
                   <td class="attribute-detail">ID Laporan</td>
                   <td id="modalId">Loading ... </td>
                 </tr>
                 <tr>
                   <td class="attribute-detail">Pelapor</td>
                   <td id="modalPelapor">Loading ... </td>
                 </tr>
                 <tr>
                   <td>Section</td>
                   <td id="modalSection">Loading ...</td>
                 </tr>
                 <tr>
                   <td>BRL/Level</td>
                   <td id="modalBrl">Loading ...</td>
                 </tr>
                 <tr>
                   <td>Tanggal</td>
                   @if(request()->is('admin/greencard'))
                      <td><input type="text" id="modalTanggal" name="date" class="form-control"></td>
                   @else
                      <td id="modalTanggal">29 November 2019</td>
                   @endif
                 </tr>
                 <tr>
                   <td>Waktu</td>
                   @if(request()->is('admin/greencard'))
                      <td><input id="modalWaktu" name="time" class="form-control"></td>
                   @else
                      <td id="modalWaktu">12.01</td>
                   @endif
                   </td>
                 </tr>
                 <tr>
                   <td>Lokasi</td>
                   @if(request()->is('admin/greencard'))
                   <td>
                     <select class="form-control" name="location" id="modalLokasi">
                       <option value="Office">Office</option>
                       <option value="Warehouse">Warehouse</option>
                       <option value="Workshop">Workshop</option>
                       <option value="Area Tambang">Area Tambang (OB)</option>
                       <option value="Area Tambang (Coal)">Area Tambang (Coal)</option>
                       <option value="Area Mess">Area Mess</option>
                       <option value="Pit Stop/Shutdown">Pit Stop / Shutdown</option>
                       <option value="Area Lainnya">Area Lainnya</option>
                     </select>
                   </td>
                   @else
                   <td id="modalLokasi">Loading ...</td>
                   @endif
                 </tr>
                 <tr>
                   <td>Detail Lokasi</td>
                   @if(request()->is('admin/greencard'))
                    <td><input type="text" id="modalDetailLokasi" name="detail_location" class="form-control"></td>
                   @else
                    <td id="modalDetailLokasi">Loading ...</td>
                   @endif
                 </tr>
                 <tr>
                   <td>Kategori Bahaya</td>
                   @if(request()->is('admin/greencard'))
                   <td>
                      <select class="form-control" name="danger_category" id="modalKategoriBahaya">
                        <option value="Kondisi Tidak Aman"> Kondisi Tidak Aman </option>
                        <option value="Tindakan Tidak Aman"> Tindakan Tidak Aman</option>
                      </select>
                   </td>
                   @else
                   <td id="modalKategoriBahaya"></td>
                   @endif
                 </tr>
                 <tr>
                   <td>Deskripsi Bahaya</td>
                   @if(request()->is('admin/greencard'))
                    <td><input type="text" id="modalDeskripsiBahaya" name="description" class="form-control"></td>
                   @else
                    <td id="modalDeskripsiBahaya">Loading ...</td>
                   @endif
                 </tr>
                 <tr>
                   <td>Risiko</td>
                   @if(request()->is('admin/greencard'))
                    <td><input type="text" id="modalRisiko" name="risk" class="form-control"></td>
                   @else
                    <td id="modalRisiko">Loading ...</td>
                   @endif
                 </tr>
                 <tr>
                   <td>Kode bahaya</td>
                   @if(request()->is('admin/greencard'))
                   <td>
                     <select class="form-control" name="danger_code" id="modalKodeBahaya">
                      <option>AA</option>
                      <option>A</option>
                      <option>B </option>
                      <option>C</option>
                    </select>
                   </td>
                   @else
                   <td id="modalKodeBahaya"></td>
                   @endif
                 </tr>
                 <tr>
                   <td>Tindakan Perbaikan</td>
                   @if(request()->is('admin/greencard'))
                    <td><input type="text" id="modalTindakanPerbaikan" name="action" class="form-control"></td>
                   @else
                    <td id="modalTindakanPerbaikan">Loading ...</td>
                   @endif
                 </tr>
                 <tr>
                   <td>PIC Section</td>
                   @if(request()->is('admin/greencard'))
                   <td>
                     <select class="form-control" name="pic" id="modalPic">
                       @foreach(\App\Models\Pic::all() as $s)
                       <option value="{{ $s->name }}">{{ $s->name }}</option>
                       @endforeach
                     </select>
                   </td>
                   @else
                   <td id="modalPic"></td>
                   @endif
                 </tr>
                 <tr>
                   <td>Status</td>
                   <td id="modalStatus">Loading ...</td>
                 </tr>
               </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">

          @csrf
          @if(request()->is('admin/greencard'))
          <button type="submit" id="saveChange" class="btn btn-warning" style="color:white;">Save Change</button>
          <a href="#" class="btn btn-danger" id="modalDestroy" >Delete Report</a>
          @endif
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
  </form>
</div>
