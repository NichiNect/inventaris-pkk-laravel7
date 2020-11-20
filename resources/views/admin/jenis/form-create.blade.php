@extends('layouts.master_admin')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">    
@endsection

@section('content')
<div class="row my-3">
    <div class="col-md-6">
		<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('jenis.index') }}"><i class="fas fa-drafting-compass"></i> Jenis Inventaris</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-file-medical"></i> Tambah Data Jenis</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
        <h1>Form Tambah Jenis Inventaris</h1>
	</div>
</div>

<div class="row my-3">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('jenis.store') }}" method="post">
                    @csrf
                    <div class="form-group">
						<label for="nama_jenis">Nama Jenis</label>
						<input type="text" name="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror" id="nama_jenis" placeholder="Masukkan nama jenis baru..">
						@error('nama_jenis')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="kode_jenis">Kode Jenis</label>
						<input type="text" name="kode_jenis" class="form-control @error('kode_jenis') is-invalid @enderror" id="kode_jenis" placeholder="Masukkan nama jenis baru.." maxlength="10" readonly value="{{ $kodeJenis }}">
						@error('kode_jenis')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukkan keterangan.." autocomplete="off">
						@error('keterangan')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group text-right">
						<button type="submit" name="submit" class="btn btn-outline-success">Tambah Jenis Inventaris!</button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scriptjs')
<script>

</script>
@endsection