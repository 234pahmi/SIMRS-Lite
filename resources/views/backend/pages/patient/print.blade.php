<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pasien SIMRSLite {{ $now }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pasien SIMRSLite {{ $now }}</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Poliklinik</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Diagnosa</th>
                <th scope="col">No Antrian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $patient->polyclinic->name }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->phone_number }}</td>
                <td>{{ $patient->date }}</td>
                <td>{{ $patient->diagnose }}</td>
                <td>{{ $patient->queue->queue }}</td>
            </tr>
            @endforeach
        </tbody>
	</table> 
</body>
</html>