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
                <li class="breadcrumb-item"><a href="{{ route('ruang.index') }}"><i class="fas fa-box-open"></i> Peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-copy"></i> Detail Peminjaman</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-lg">
        <h1>Peminjaman</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Nama Pegawai</td>
                            <td>:</td>
                            <td>{{ $peminjaman->pegawai->nama_pegawai }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pinjam</td>
                            <td>:</td>
                            <td>{{ $peminjaman->tanggal_pinjam }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td>:</td>
                            <td>@if($peminjaman->tanggal_kembali == null) Dikembalikan @else Belum Dikembalikan @endif</td>
                        </tr>
                        <tr>
                            <td>Status Peminjaman</td>
                            <td>:</td>
                            <td>@if($peminjaman->status_peminjaman == 1) Dikembalikan @else Belum Dikembalikan @endif </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg">
        <h1>Detail Pinjam</h1>
        <x-flash-message></x-flash-message>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="{{ route('detail.create', $peminjaman->id) }}" class="btn btn-success mb-3">Tambah Detail Pinjam</a>
                <table class="table table-hover">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($detailPinjam as $d)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->inventaris->nama }}</td>
                                <td>{{ $d->jumlah }}</td>
                                <td>
                                    <form action="" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h3>Data Kosong</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection