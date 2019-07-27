@extends('layout.master')

@include('layout.menu_verifikator')

@section('content')
<!-- content home -->
  <div class="container" >
    <form class="" action="index.html" method="post">
    <div class="row">
      <div class="col-lg-6">
        <div class="report-form-container">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Section</label>
            <select class="form-control" id="exampleFormControlSelect1">
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
          <div class="form-group">
            <label for="exampleFormControlSelect1">BRL/Level</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>Vendor/Mitra Kerja</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Tanggal ditemukannya bahaya (bulan/hari/tahun)</label>
            <input id="datepicker" width="276" />


          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Waktu ditemukannya bahaya</label>
              <input placeholder="Selected time" type="text" id="input_starttime" class="form-control timepicker">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Lokasi</label>
            <select class="form-control" id="exampleFormControlSelect2">
              <option>Office</option>
              <option>Warehouse</option>
              <option>Workshop</option>
              <option>Area Tambang (OB)</option>
              <option>Area Tambang (Coal)</option>
              <option>Area Mess</option>
              <option>Pit Stop/ Shutdown</option>
              <option>Area Lainnya</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Detail Lokasi</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Pit M sisi timur front PC2000-30"></textarea>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="report-form-container">
          <div class="row">
            <div class="col">
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Kategori Bahaya</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option> Kondisi Tidak Aman </option>
                    <option> Tindakan Tidak Aman</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kode Bahaya</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>AA</option>
                      <option>A</option>
                      <option>B </option>
                      <option>C</option>
                    </select>
                  </div>
              </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Deskripsi Bahaya</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Ditemukan tinggi tanggul yang kurang dari 3/4 tinggi tyre HD"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Resiko</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Unit terjatuh karena tidak ada pengamanan"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Tindakan Perbaikan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Melakukan peninggian tanggul 3/4 dari tinggi tyre HD sesuai dengan standar"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Status</label>
            <select class="form-control" id="exampleFormControlSelect2">
              <option>Open</option>
              <option>Close</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary form-control">Submit Laporan</button>
        </div>
      </div>
    </div>
    </form>
  </div>

<!-- end content home -->
@endsection
