<table class="table table-hover table-responsive">
    <tbody>
        <tr>
            <td class="key">Nama Jenis</td>
            <td>:</td>
            <td>{{ $jenis->nama_jenis }}</td>
        </tr>
        <tr>
            <td class="key">Kode Jenis</td>
            <td>:</td>
            <td>{{ $jenis->kode_jenis }}</td>
        </tr>
        <tr>
            <td class="key">Keterangan</td>
            <td>:</td>
            <td>{{ $jenis->keterangan }}</td>
        </tr>
        <tr>
            <td class="key">Tanggal Ditambahkan</td>
            <td>:</td>
            <td>{{ $jenis->created_at->diffForHumans() . ', ' . $jenis->created_at }}</td>
        </tr>
        <tr>
            <td class="key">Tanggal Terakhir Diubah</td>
            <td>:</td>
            <td>
                @if ($jenis->updated_at)
                    {{ $jenis->updated_at->diffForHumans() . ', ' . $jenis->updated_at }}
                @else
                    {{ '-' }}
                @endif
            </td>
        </tr>
    </tbody>
</table>