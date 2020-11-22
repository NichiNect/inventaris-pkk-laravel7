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
                <li class="breadcrumb-item"><a href="{{ route('petugas.index') }}"><i class="fas fa-users-cog"></i> User Management</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Detail User</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-8">
        <h2>Detail Petugas: {{ $petugas->nama_petugas }}</h2>
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
    <div class="col-md-8">
        <a href="{{ route('petugas.edit', $petugas->id) }}" class="btn btn-warning mb-3"><i class="fas fa-edit"></i> Edit</a>
        <form action="{{ route('petugas.destroy', $petugas->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button class="btn btn-danger text-white mx-2 mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                <i class="fas fa-trash"></i> Hapus
            </button>
        </form>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="key">ID</td>
                            <td>{{ $petugas->id }}</td>
                        </tr>
                        <tr>
                            <td class="key">Username</td>
                            <td>{{ $petugas->user->username }}</td>
                        </tr>
                        <tr>
                            <td class="key">Nama Lengkap</td>
                            <td>{{ $petugas->nama_petugas }}</td>
                        </tr>
                        <tr>
                            <td class="key">Email</td>
                            <td>{{ $petugas->user->email }}</td>    
                        </tr>
                        <tr>
                            <td class="key">Role/User Level</td>
                            <td>{{ $petugas->user->level->nama_level }}</td>
                        </tr>
                        <tr>
                            <td class="key">Tanggal Didaftarkan</td>
                            <td>{{ $petugas->created_at->diffForHumans() . ', ' . $petugas->created_at }}</td>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@endsection