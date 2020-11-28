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
                <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}"><i class="fas fa-box-open"></i> Peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-copy"></i> Data Peminjaman</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Data Peminjaman</h1>
        <x-flash-message></x-flash-message>
        
        <x-nav-peminjaman></x-nav-peminjaman>
        
    </div>
</div>

<div class="row my-3">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Status Peminjaman</th>
                        <th scope="col">Jumlah Item</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($peminjaman as $p)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $p->pegawai->nama_pegawai }}</td>
                            <td>
                                @if ($p->status_peminjaman == 0)
                                    {{ "Belum di ACC" }}
                                @elseif($p->status_peminjaman == 1)
                                    {{ "Peminjaman telah di ACC" }}
                                @elseif($p->status_peminjaman == 2)
                                    {{ "Request Kembali" }}
                                @elseif($p->status_peminjaman == 3)
                                    {{ "Dikembalikan" }}
                                @endif
                            </td>
                            <td>{{ count($p->detail_pinjam). " Item" }}</td>
                            <td>{{ $p->tanggal_pinjam }}</td>
                            <td>@if($p->tanggal_kembali == null) Belum Dikembalikan @else {{ $p->tanggal_kembali }} @endif </td>
                            <td>
                                @if (\Auth::user()->level->nama_level != "Pegawai")
                                <form action="{{ route('peminjaman.patch.acc', $p->id) }}" method="POST" class="d-block mb-1">
                                    @method('patch')
                                    @csrf
                                    <button class="btn btn-outline-success" onclick="return confirm('Apakah anda yakin menyetujui request ini?');">
                                        <i class="fas fa-check"></i> ACC Permintaan
                                    </button>
                                </form>
                                @endif
                                <a href="{{ route('detail.index', $p->id) }}" id="showDetail" class="btn btn-info"><i class="fas fa-search"></i> Detail</a>
                                <form action="{{ route('peminjaman.delete', $p->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <h3>Data Kosong</h3>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $peminjaman->links() }}
            </div>
        </div>
    </div>
</div>
@endsection