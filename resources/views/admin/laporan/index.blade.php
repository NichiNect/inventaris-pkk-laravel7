@extends('layouts.master_admin')

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-clipboard-list"></i> Laporan</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-lg">
        <h1>Cetak Laporan</h1>
    </div>
</div>

<div class="row my-3">
    <div class="col-lg-8">
        <div class="d-flex">
            <div class="dropdown mx-1">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="export_peminjaman" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cetak Laporan Peminjaman
            </button>
            <div class="dropdown-menu" aria-labelledby="export_peminjaman">
              <a class="dropdown-item" href="{{ route('laporan.peminjaman.pdf') }}">Export PDF</a>
              <a class="dropdown-item" href="#">Export Excel</a>
            </div>
        </div>
        <div class="dropdown mx-1">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="export_inventaris" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cetak Laporan Inventaris
            </button>
            <div class="dropdown-menu" aria-labelledby="export_inventaris">
              <a class="dropdown-item" href="{{ route('laporan.inventaris.pdf') }}">Export PDF</a>
              <a class="dropdown-item" href="#">Export Excel</a>
            </div>
        </div>
        <div class="dropdown mx-1">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="export_jenis" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cetak Laporan Daftar Jenis
            </button>
            <div class="dropdown-menu" aria-labelledby="export_jenis">
              <a class="dropdown-item" href="{{ route('laporan.jenis.pdf') }}">Export PDF</a>
              <a class="dropdown-item" href="#">Export Excel</a>
            </div>
        </div>
        <div class="dropdown mx-1">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="export_ruang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cetak Laporan Daftar Ruang
            </button>
            <div class="dropdown-menu" aria-labelledby="export_ruang">
              <a class="dropdown-item" href="{{ route('laporan.ruang.pdf') }}">Export PDF</a>
              <a class="dropdown-item" href="#">Export Excel</a>
            </div>
        </div>
        </div>
        
    </div>
</div>
@endsection