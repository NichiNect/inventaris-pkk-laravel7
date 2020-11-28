@extends('layouts.master_admin')

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ruang.index') }}"><i class="fas fa-box-open"></i> Peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-plus"></i> Create Request Pinjam</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Request Peminjaman Inventaris</h1>
    </div>
</div>

<div class="row my-3">
    <div class="col-lg">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('peminjaman.store.req') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam" placeholder="Masukkan nama peminjam.." readonly value="{{ auth()->user()->name }}">
                            @error('nama_peminjam')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" placeholder="Masukkan tanggal.." readonly value="{{ date('Y-m-d', time()) }}">
                            @error('tanggal_pinjam')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 pt-2">
                            <p class="text-danger"><b>Apakah Anda yakin ingin melanjutkan peminjaman?</b></p>
                        </div>
                    </div>
                    <div class="form-group">
						<button type="submit" name="submit" class="btn btn-outline-success">Kirim!</button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection