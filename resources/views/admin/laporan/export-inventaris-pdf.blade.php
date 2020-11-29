<!DOCTYPE html>
<head>
    <title>Export Inventaris PDF</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
    
    <h5 class="text-center">Data Inventaris Pada Tanggal {{ date('d-m-Y') }}</h5>
    <br>
    <table class="table table-striped" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Jumlah Tersedia</th>
                <th>Tanggal Register</th>
                <th>Kode Inventaris</th>
                <th>Jenis</th>
                <th>Ruang</th>
                <th>Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @forelse ($inventaris as $data)
        <tr>
            <th>{{ $i++ }}</th>
            <td>{{ ucwords($data->nama) }}</td>
            <td>{{ $data->kondisi }}</td>
            <td>{{ ucwords($data->keterangan) }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>{{ $data->tanggal_register }}</td>
            <td>{{ $data->kode_inventaris }}</td>
            <td>{{ $data->jenis->nama_jenis }}</td>
            <td>{{ $data->ruang->nama_ruang }}</td>
            <td>{{ $data->petugas->nama_petugas }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">
                <h3>Data Kosong</h3>
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>
