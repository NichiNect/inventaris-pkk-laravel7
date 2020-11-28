@extends('layouts.master_admin')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
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
                <li class="breadcrumb-item"><a href="{{ route('detail.index', $peminjaman->id) }}"><i class="fas fa-copy"></i> Data Detail Pinjam</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-plus"></i> Tambah Detail Pinjam</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-lg">
        <h1>Tambah Detail Peminjaman</h1>
        <x-flash-message></x-flash-message>
    </div>
</div>

<div class="row my-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body shadow-sm">
                <form action="{{ route('detail.store') }}" method="POST">
                    {{-- nama ruang, jenis barang, nama barang, jumlah --}}
                    @csrf
                    <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">
                    <div class="form-group">
						<label for="nama_peminjam">Nama Peminjam</label>
						<input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam" placeholder="Masukkan nama peminjam.." readonly value="{{ auth()->user()->name }}">
						@error('nama_peminjam')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="ruang">Ruang</label>
                        <select name="ruang" id="ruang" class="form-control select2">
                            <option value="-" selected disabled>-- Pilih Ruang --</option>
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
                        <select name="jenis" id="jenis" class="form-control select2" disabled>
                            <option value="0" selected disabled>-- Pilih Jenis --</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->id . ' - ' . $j->nama_jenis }}</option>
                            @endforeach
                        </select>
						@error('jenis')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_inventaris">Nama Barang Inventaris</label>
                        <select name="nama_inventaris" id="nama_inventaris" class="form-control select2" disabled>
                            <option value="0" selected disabled>-- Pilih Nama Barang Inventaris --</option>
                            {{-- @foreach ($inventaris as $invent)
                                <option value="{{ $invent->id }}">{{ $invent->id . ' - ' . $invent->nama }}</option>
                            @endforeach --}}
                        </select>
						@error('nama_inventaris')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah.." min="1" max="">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" id="submit" class="btn btn-primary">Tambahkan!</button>
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
        let ruang_id = $('#ruang');
        let jenis_id = $('#jenis');
        let dataInventaris;

        // change ruang
        $('#ruang').change(function(e) {
            e.preventDefault();
            if(ruang_id != 0) {
                ruang_id = $(this).val();
                $('#jenis').removeAttr('disabled');
            } else {
                $('#jenis').addAttr('disabled');
            }
        });

        // change jenis
        $('#jenis').change(function(e) {
            e.preventDefault();
            if(jenis_id != 0) {
                jenis_id = $(this).val();
                $('#nama_inventaris').removeAttr('disabled');
            } else {
                $('#nama_inventaris').addAttr('disabled');
            }
        });

        // select2
        $('.select2').select2({
            placeholder: 'Masukkan anu..'
        });

        $('#nama_inventaris').select2({
            placeholder: "Masukkan nama inventaris..",
            // minimumInputLength: 1,
            ajax: {
                url: '{{ route('api.get.invent') }}',
                dataType: 'json',
                data: function (params) {
                        return {
                            ruang_id: ruang_id,
                            jenis_id: jenis_id,
                            search: params.term
                        };
                    },
                processResults: function (response) {
                    // $('#jumlah').attr('max', response.jumlah);
                    dataInventaris = response;
                    return {
                        results: response
                    }
                },
            },
            cache: true,
        });

    });
</script>
@endsection