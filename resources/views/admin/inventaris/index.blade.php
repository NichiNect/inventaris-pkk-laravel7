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
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cubes"></i> Data Inventaris</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Data Semua Inventaris</h1>
        @if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
        @endif
        @can('isAdmin')
        <a href="{{ route('invent.create') }}" class="btn btn-outline-primary my-3">
			<i class="fas fa-plus"></i> Tambah Data Inventaris Baru
		</a>
        @endcan
    </div>
</div>

<div class="row my-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Kode Inventaris</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($inventaris as $invent)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ ucwords($invent->nama) }}</td>
                            <td>{{ $invent->kondisi }}</td>
                            <td>{{ ucwords($invent->keterangan) }}</td>
                            <td>{{ $invent->jumlah }}</td>
                            <td>{{ $invent->kode_inventaris }}</td>
                            <td>
                                <a href="{{ route('invent.show', $invent->id) }}" id="showDetail" class="btn btn-success"><i class="fas fa-search"></i> Detail</a>
                                @can('isAdmin')
                                <a href="{{ route('invent.edit', $invent->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('invent.destroy', $invent->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <h3>Data Kosong</h3>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $inventaris->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
