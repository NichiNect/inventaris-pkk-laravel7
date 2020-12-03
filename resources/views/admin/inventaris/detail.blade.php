@extends('layouts.master_admin')

@section('style')
    <style>
        .key {
            font-weight: bold;
        }
    </style>
@endsection

@section('content')

<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('invent.index') }}"><i class="fas fa-gem"></i> Inventaris</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-search"></i> Detail Inventaris</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-8">
        <h2>Detail Barang Inventaris: {{ $inventaris->nama }}</h2>
        @if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
        @endif
    </div>
</div>

<div class="row my-3">
    <div class="col-md-8">
        @can('isAdmin')
        <a href="{{ route('invent.edit', $inventaris->id) }}" class="btn btn-warning mb-3"><i class="fas fa-edit"></i> Edit</a>
        <form action="{{ route('invent.destroy', $inventaris->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button class="btn btn-danger text-white mx-2 mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
        @endcan
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td class="key">ID</td>
                            <td>:</td>
                            <td>{{ $inventaris->id }}</td>
                        </tr>
                        <tr>
                            <td class="key">Nama</td>
                            <td>:</td>
                            <td>{{ $inventaris->nama }}</td>
                        </tr>
                        <tr>
                            <td class="key">Kondisi</td>
                            <td>:</td>
                            <td>{{ $inventaris->kondisi }}</td>
                        </tr>
                        <tr>
                            <td class="key">Keterangan</td>
                            <td>:</td>
                            <td>{{ $inventaris->keterangan }}</td>
                        </tr>
                        <tr>
                            <td class="key">Jumlah</td>
                            <td>:</td>
                            <td>{{ $inventaris->jumlah }}</td>
                        </tr>
                        <tr>
                            <td class="key">Tanggal Register</td>
                            <td>:</td>
                            <td>{{ $inventaris->tanggal_register }}</td>
                        </tr>
                        <tr>
                            <td class="key">Kode Inventaris</td>
                            <td>:</td>
                            <td>{{ $inventaris->kode_inventaris }}</td>
                        </tr>
                        <tr>
                            <td class="key">Jenis</td>
                            <td>:</td>
                            <td>{{ $inventaris->jenis->nama_jenis }}</td>
                        </tr>
                        <tr>
                            <td class="key">Ruang</td>
                            <td>:</td>
                            <td>{{ $inventaris->ruang->nama_ruang }}</td>
                        </tr>
                        <tr>
                            <td class="key">Petugas</td>
                            <td>:</td>
                            <td>{{ $inventaris->petugas->nama_petugas }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection