<!DOCTYPE html>
<head>
    <title>Export Peminjaman PDF</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
    
    <h5 class="text-center">Data Peminjaman Pada Tanggal {{ date('d-m-Y') }}</h5>
    <br>
    <table class="table table-striped" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Peminjam</th>
                <th>Status Pinjam</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @forelse ($peminjaman as $data)
        <tr>
            <th>{{ $i++ }}</th>
            <td>{{ $data->tanggal_pinjam }}</td>
            <td>
                @if($data->tanggal_kembali == null) Belum Dikembalikan @else {{ $data->tanggal_kembali }} @endif
            </td>
            <td>{{ $data->pegawai->nama_pegawai }}</td>
            <td>
                @if ($data->status_peminjaman == 0)
                {{ "Request Peminjaman Belum di ACC" }}
                @elseif($data->status_peminjaman == 1)
                {{ "Peminjaman telah di ACC" }}
                @elseif($data->status_peminjaman == 2)
                {{ "Request Kembali" }}
                @elseif($data->status_peminjaman == 3)
                {{ "Dikembalikan" }}
                @endif
            </td>
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
