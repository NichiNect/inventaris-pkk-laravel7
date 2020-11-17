@extends('layouts.master_admin')

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> User Management</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
    <div class="col-md-6">
        <h1>Data Semua Petugas</h1>
        @if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
        @endif
        
        <a href="{{ route('petugas.create') }}" class="btn btn-outline-primary my-3">
			<i class="fas fa-user-plus"></i> Tambah Petugas Baru
		</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Tanggal Didaftarkan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($petugas as $p)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $p->user->username }}</td>
                            <td>{{ $p->nama_petugas }}</td>
                            <td>{{ $p->user->level->nama_level }}</td>
                            <td>{{ $p->created_at->diffForHumans() . ', ' . $p->created_at }}</td>
                            <td>
                                <a href="" id="showDetailUser" class="btn btn-success"><i class="fas fa-user"></i> Detail</a>
                                <a href="" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <form action="" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <h1>Data Kosong</h1>
                        @endforelse
                    </tbody>
                  </table>
                  {{ $petugas->links() }}
            </div>
        </div>
    </div>
</div>

@endsection