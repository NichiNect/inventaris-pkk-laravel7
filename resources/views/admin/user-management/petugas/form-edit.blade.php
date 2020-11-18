@extends('layouts.master_admin')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">    
@endsection

@section('content')
<div class="row my-3">
    <div class="col-md-6">
		<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('petugas.index') }}"><i class="fas fa-users-cog"></i> User Management</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-edit"></i> Edit Data User</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
        <h1>Form Edit Data Petugas</h1>
	</div>
</div>

<div class="row my-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('petugas.update', $petugas->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama user baru.." value="{{ $petugas->nama_petugas }}">
						@error('nama')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan username baru.." value="{{ $petugas->user->username }}">
						@error('username')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email user baru.." value="{{ $petugas->user->email }}">
						@error('email')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Role/User Level</label>
                        <select name="level" id="level" class="form-control select2">
                            <option value="{{ $petugas->user->level_id }}" selected>
                                {{ $petugas->user->level_id . ' - ' . $petugas->user->level->nama_level }}
                            </option>
                            <option value="-" disabled>Masukkan Role/User Level</option>
                            <option value="1">1 - Administrator</option>
                            <option value="2">2 - Operator</option>
                            <option value="3">3 - Pegawai</option>
                        </select>
                    </div>
                    <div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password user baru.." value="{{ bcrypt($petugas->user->password) }}" readonly>
						@error('password')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group text-right">
						<button type="submit" name="submit" class="btn btn-outline-success">Edit data petugas!</button>
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
        $('.select2').select2({
            placeholder: 'Masukkan role level..'
        });
    });
</script>
@endsection