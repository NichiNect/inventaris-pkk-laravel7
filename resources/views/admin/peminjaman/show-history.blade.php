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
	<div class="col-md-7">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}"><i class="fas fa-box-open"></i> Peminjaman</a></li>
                <li class="breadcrumb-item"><a href="{{ route('peminjaman.history.index') }}"><i class="fas fa-history"></i> History Peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-search"></i> Detail History Peminjaman</li>
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
                            <td>@if($peminjaman->tanggal_kembali == null) Belum Dikembalikan @else {{ $peminjaman->tanggal_kembali }} @endif</td>
                        </tr>
                        <tr>
                            <td>Status Peminjaman</td>
                            <td>:</td>
                            <td>
                                @if ($peminjaman->status_peminjaman == 0)
                                    {{ "Belum di ACC" }}
                                @elseif($peminjaman->status_peminjaman == 1)
                                    {{ "Peminjaman telah di ACC" }}
                                @elseif($peminjaman->status_peminjaman == 2)
                                    {{ "Request Kembali" }}
                                @elseif($peminjaman->status_peminjaman == 3)
                                    {{ "Dikembalikan" }}
                                @endif
                            </td>
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
                <table class="table table-hover">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Ruang</th>
                        <th scope="col">Jumlah</th>
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
                                <td>{{ $d->inventaris->ruang->nama_ruang }}</td>
                                <td>{{ $d->jumlah }}</td>
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