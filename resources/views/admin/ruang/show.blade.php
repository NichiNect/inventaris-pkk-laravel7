<table class="table table-hover table-responsive">
    <tbody>
        <tr>
            <td class="key">Nama Ruangan</td>
            <td>:</td>
            <td>{{ $ruang->nama_ruang }}</td>
        </tr>
        <tr>
            <td class="key">Kode Ruangan</td>
            <td>:</td>
            <td>{{ $ruang->kode_ruang }}</td>
        </tr>
        <tr>
            <td class="key">Keterangan</td>
            <td>:</td>
            <td>{{ $ruang->keterangan }}</td>
        </tr>
        <tr>
            <td class="key">Tanggal Ditambahkan</td>
            <td>:</td>
            <td>{{ $ruang->created_at->diffForHumans() . ', ' . $ruang->created_at }}</td>
        </tr>
        <tr>
            <td class="key">Tanggal Terakhir Diubah</td>
            <td>:</td>
            <td>
                @if ($ruang->updated_at)
                    {{ $ruang->updated_at->diffForHumans() . ', ' . $ruang->updated_at }}
                @else
                    {{ '-' }}
                @endif
            </td>
        </tr>
    </tbody>
</table>