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
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-copy"></i> Data Peminjaman</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Data Peminjaman</h1>
        @if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
        @endif
        
        <a href="{{ route('peminjaman.req.pinjam') }}" class="btn btn-outline-primary my-3">
			<i class="fas fa-plus"></i> Tambah Peminjaman
		</a>
        <a href="" class="btn btn-outline-success my-3">
			<i class="fas fa-check"></i> Peminjaman Disetujui
		</a>
        <a href="" class="btn btn-outline-warning my-3">
			<i class="far fa-comment-dots"></i> Request Kembali
		</a>
        <a href="" class="btn btn-outline-info my-3">
			<i class="fas fa-history"></i> History Peminjaman
		</a>
    </div>
</div>

<div class="row my-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah Item</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Aksi</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection