@extends('layout.master')

@include('layout.menu_verifikator')

@section('content')
<!-- content home -->
  <div class="container" >
    <form class="" action="{{ url('/verifikator/lapor') }}" method="post">@csrf

    <br><h5>Form Pelaporan Bahaya</h5>

    @if ($errors->any())
    <br><small>
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </div>
    </small>
    @endif

    @if (session('success'))
      <br><small>
        <div class="alert alert-success"> {{ session('success') }} </div>
      </small>
    @endif

    <div class="row" style="margin-top: -20px">
      <div class="col-lg-6">
        <div class="report-form-container">
          <div class="form-group">
            <label for="exampleFormControlSelect2">Tanggal ditemukannya bahaya (bulan/hari/tahun)</label>
            <!-- <input id="datepicker" width="276" /> -->
            <div class="form-group">
                <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="date" required value="{{ old('date') }}" class="form-control datetimepicker-input" data-target="#datetimepicker" placeholder="Klik icon disamping ->"/>
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Waktu ditemukannya bahaya</label>
            <div class="form-group">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" name="time" required value="{{ old('time') }}" class="form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="Klik icon disamping ->"/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Lokasi</label>
            <select class="form-control" name="location" id="exampleFormControlSelect2">
              <option value="Office">Office</option>
              <option value="Warehouse">Warehouse</option>
              <option value="Workshop">Workshop</option>
              <option value="Area Tambang">Area Tambang (OB)</option>
              <option value="Area Tambang (Coal)">Area Tambang (Coal)</option>
              <option value="Area Mess">Area Mess</option>
              <option value="Pit Stop/Shutdown">Pit Stop / Shutdown</option>
              <option value="Area Lainnya">Area Lainnya</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Detail Lokasi</label>
            <textarea class="form-control" name="detail_location" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Pit M sisi timur front PC2000-30">{{ old('detail_location') }}</textarea>
          </div>
          <div class="grid-container">
            <div class="grid-area-1">
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Kategori Bahaya</label>
                  <select class="form-control" name="danger_category" id="exampleFormControlSelect1">
                    <option value="Kondisi Tidak Aman"> Kondisi Tidak Aman </option>
                    <option value="Tindakan Tidak Aman"> Tindakan Tidak Aman</option>
                  </select>
                </div>
              </div>
              <div class="grid-area-2">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kode Bahaya</label>
                    <select class="form-control" name="danger_code" id="exampleFormControlSelect1">
                      <option>AA</option>
                      <option>A</option>
                      <option>B </option>
                      <option>C</option>
                    </select>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="report-form-container">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Deskripsi Bahaya</label>
            <textarea class="form-control" required name="description" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Ditemukan tinggi tanggul yang kurang dari 3/4 tinggi tyre HD">{{ old('description') }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Resiko</label>
            <textarea class="form-control" required name="risk" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Unit terjatuh karena tidak ada pengamanan">{{ old('risk') }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Tindakan Perbaikan</label>
            <textarea class="form-control" required name="action" id="exampleFormControlTextarea1" rows="2" placeholder="Contoh: Melakukan peninggian tanggul 3/4 dari tinggi tyre HD sesuai dengan standar">{{ old('action') }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect2">Status</label>
            <select class="form-control" name="status" id="exampleFormControlSelect2">
              <option value="Open">Open</option>
              <option value="Close">Close</option>
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
