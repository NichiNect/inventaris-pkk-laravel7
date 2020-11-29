<!DOCTYPE html>
<head>
    <title>Export Daftar Ruang PDF</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
    
    <h5 class="text-center">Data Daftar Ruang Pada Tanggal {{ date('d-m-Y') }}</h5>
    <br>
    <table class="table table-striped" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Ruang</th>
                <th>Kode Ruang</th>
                <th>Keterangan</th>
                <th>Tanggal Terdaftar</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @forelse ($ruang as $data)
        <tr>
            <th>{{ $i++ }}</th>
            <td>{{ $data->nama_ruang }}</td>
            <td>{{ $data->kode_ruang }}</td>
            <td>{{ ucwords($data->keterangan) }}</td>
            <td>{{ $data->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                <h3>Data Kosong</h3>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>
