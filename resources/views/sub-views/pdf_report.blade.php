<!DOCTYPE html>
<html>
<head>
	<title>Laporan Green Card Buma</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css" media="print">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    @page { size: landscape; }
	</style>
</head>
<body onload="window.print();">
	<center>
		<h5>Laporan Green Card Buma</h4>
		<h6><a target="_blank" href="https://www.greencardbuma.com/">www.greencardbuma.com</a></h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>ID</th>
				<th>NIK</th>
				<th>Tanggal</th>
				<th>Lokasi</th>
				<th>Detail Lokasi</th>
        <th>Kategori Bahaya</th>
        <th>Kode Bahaya</th>
        <th>Deskripsi</th>
        <th>Risiko</th>
        <th>Aksi</th>
        <th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($report as $p)
			<tr>
				<td>{{ $p->id }}</td>
				<td>{{$p->nik}}</td>
				<td>{{$p->date}}</td>
				<td>{{$p->location}}</td>
				<td>{{$p->detail_location}}</td>
				<td>{{$p->danger_category}}</td>
        <td>{{$p->danger_code}}</td>
        <td>{{$p->description}}</td>
        <td>{{$p->risk}}</td>
        <td>{{$p->action}}</td>
        <td>{{$p->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
