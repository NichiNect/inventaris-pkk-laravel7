@extends('layouts.master_admin')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">    
@endsection

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('invent.index') }}"><i class="fas fa-gem"></i> Inventaris</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cube"></i> Tambah Data Inventaris</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Form Tambah Data Inventaris</h1>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('invent.store') }}" method="post">
                    @csrf
                    <div class="form-group">
						<label for="nama_barang">Nama Barang Inventaris</label>
						<input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Masukkan nama barang inventaris..">
						@error('nama_barang')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi Barang Inventaris</label>
						<select name="kondisi" id="kondisi" class="form-control @error('kondisi') is-invalid @enderror">
                            <option value="-" selected disabled>-- Pilih Kondisi --</option>
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup Baik">Cukup Baik</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                        </select>
						@error('kondisi')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukkan keterangan barang inventaris..">
						@error('keterangan')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="jumlah">jumlah</label>
						<input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" min="1" placeholder="Masukkan jumlah barang inventaris..">
						@error('jumlah')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="ruang">Ruang</label>
						<select name="ruang" id="ruang" class="form-control @error('ruang') is-invalid @enderror select2 ruang">
                            <option value="" selected disabled>-- Pilih Ruang --</option>
                            @foreach ($ruang as $r)
                                <option value="{{ $r->id }}">{{ $r->id . ' - ' . $r->nama_ruang }}</option>
                            @endforeach
                        </select>
						@error('ruang')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
						<select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror select2 jenis">
                            <option value="" selected disabled>-- Pilih Jenis --</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->id . ' - ' . $j->nama_jenis }}</option>
                            @endforeach
                        </select>
						@error('jenis')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="petugas">Petugas</label>
						<input type="text" name="petugas" class="form-control @error('petugas') is-invalid @enderror" id="petugas" value="{{ auth()->user()->name }}" readonly>
						@error('petugas')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group text-right">
						<button type="submit" name="submit" class="btn btn-outline-success">Tambahkan data Inventaris!</button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptjs')
<script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#ruang').select2({
            placeholder: 'Masukkan ruang..'
        });
        $('#jenis').select2({
            placeholder: 'Masukkan jenis..'
        });

    });
</script>
@endsection