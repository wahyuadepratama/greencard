@extends('layout.master')

@include('layout.menu_admin')

@section('content')

<div class="container">

  <br><div class="clearfix">
    <div class="section-year form-inline">
      <div class="section form-group" style="margin-right:60px;">
        <select class="form-control" onchange="changeDate()" id="year">
          <option value="all">Semua Tahun</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
        </select>
      </div>
      <div class="year" style="margin-left:10px;">
        <select class="form-control" id="month" onchange="changeDate()">
          <option value="all">Semua Bulan</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
      </div>
    </div>
  </div><br><br>

  <div class="border p-4 mt-4" style="">
      <center><p>Download data pelaporan all section <b id="titleSummary"> </b></p></center>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3" style="margin: 5px">
          <a id='pdf' href="{{ url('/admin/summary/report/export/pdf/2019/02') }}" class="form-control btn btn-primary">
            Download PDF
          </a>
        </div>
        <div class="col-sm-3" style="margin: 5px">
          <a id='excel' href="{{ url('/admin/summary/report/export/excel/2019/02') }}" class="form-control btn btn-primary">
            Download Excel
          </a>
        </div>
        <div class="col-sm-3"></div>
      </div>
  </div>
</div>

@endsection

@section('js-ajax')
  <script type="text/javascript">
    function changeDate() {
      var textYear = $('#year option:selected').text();
      var textMonth = $('#month option:selected').text();

      var year = document.getElementById('year').value;
      var month = document.getElementById('month').value;
      $('#titleSummary').html('bulan: '+ textMonth + ' & tahun: '+ textYear);
      $('#excel').attr('href', "{{ url('/admin/summary/report/export/excel/') }}"+ "/" + year + "/" + month);
      $('#pdf').attr('href', "{{ url('/admin/summary/report/export/pdf/') }}"+ "/" + year + "/" + month);
      // console.log($('#excel').attr('href'));
    }
  </script>
@endsection
