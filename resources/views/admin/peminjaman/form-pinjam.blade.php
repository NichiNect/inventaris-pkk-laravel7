@extends('layouts.master_admin')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">    
@endsection

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ruang.index') }}"><i class="fas fa-box-open"></i> Peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-plus"></i> Request Pinjam</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Form Request Peminjaman Barang Inventaris</h1>
    </div>
</div>

<div class="row my-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    {{-- nama ruang, jenis barang, nama barang, jumlah --}}
                    @csrf
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
                            @foreach ($inventaris as $invent)
                                <option value="{{ $invent->id }}">{{ $invent->id . ' - ' . $invent->nama }}</option>
                            @endforeach
                        </select>
						@error('nama_inventaris')
						<small class="text-danger">{{ $message }}</small>
						@enderror
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

        // change ruang
        $('#ruang').change(function(e) {
            e.preventDefault();
            if(ruang_id != 0) {
                ruang_id = $(this).val();
                $('#jenis').removeAttr('disabled');
            } else {
                $('#jenis').addAttr('disabled');
            }
            console.log(ruang_id);
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
            console.log(jenis_id);

            $.ajax({
                method: 'get',
                url: "{{ route('api.get.invent') }}",
                dataType: 'json',
                data: {
                    'ruang_id': ruang_id,
                    'jenis_id': jenis_id
                },
                success: function(response) {
                    console.log('awikwok');
                }
            });
        });


        // select2
        $('.select2').select2({
            placeholder: 'Masukkan anu..'
        });
    });
</script>
@endsection