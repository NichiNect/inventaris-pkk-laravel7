@extends('layouts.master_admin')

@section('content')
<div class="row my-3">
    <div class="col-md-6">
		<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ruang.index') }}"><i class="fas fa-building"></i> Ruangan</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Edit Data Ruangan</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
        <h1>Form Edit Data Ruangan</h1>
	</div>
</div>

<div class="row my-3">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('ruang.update', $ruang->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
						<label for="nama_ruang">Nama Ruangan</label>
						<input type="text" name="nama_ruang" class="form-control @error('nama_ruang') is-invalid @enderror" id="nama_ruang" placeholder="Masukkan nama ruangan baru.." value="{{ $ruang->nama_ruang }}">
						@error('nama_ruang')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="kode_ruang">Kode Ruangan</label>
						<input type="text" name="kode_ruang" class="form-control @error('kode_ruang') is-invalid @enderror" id="kode_ruang" placeholder="Masukkan kode ruangan baru.." maxlength="10" readonly value="{{ $ruang->kode_ruang }}">
						@error('kode_ruang')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukkan keterangan.." autocomplete="off" value="{{ $ruang->keterangan }}">
						@error('keterangan')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group text-right">
						<button type="submit" name="submit" class="btn btn-outline-success">Edit Data Ruangan!</button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
