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
                <li class="breadcrumb-item"><a href="{{ route('ruang.index') }}"><i class="fas fa-building"></i> Ruangan</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-copy"></i> Data Ruangan</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        <h1>Data Semua Ruangan</h1>
        @if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
        @endif
        @can('isAdmin')
        <a href="{{ route('ruang.create') }}" class="btn btn-outline-primary my-3">
			<i class="fas fa-building"></i><i class="fas fa-file-medical"></i> Tambah Data Ruangan
		</a>
        @endcan
    </div>
</div>

<div class="row my-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col">Kode Ruangan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal Ditambahkan</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($ruang as $r)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $r->nama_ruang }}</td>
                            <td>{{ $r->kode_ruang }}</td>
                            <td>{{ ucwords($r->keterangan) }}</td>
                            <td>{{ $r->created_at->diffForHumans() . ', ' . $r->created_at }}</td>
                            <td>
                                <a href="{{ route('ruang.show', $r->id) }}" id="showDetail" class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fas fa-search"></i> Detail</a>
                                @can('isAdmin')
                                <a href="{{ route('ruang.edit', $r->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('ruang.destroy', $r->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <h3>Data Kosong</h3>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $ruang->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

<x-modal></x-modal>

@section('scriptjs')
<script>
    $(document).ready(function() {

        $('#modal-title').html('Detail Data Ruangan');
        $('#btn-save-modal').remove();

        $('table').on('click', '#showDetail', function(e) {
            e.preventDefault();

            const ini = $(this);
            const url = ini.attr('href');

            $.ajax({
                method: 'get',
                url: url,
                dataType: 'html',
                success: function(response) {
                    $('#modal .modal-body').html(response);
                }
            });
        });
    });
</script>
@endsection