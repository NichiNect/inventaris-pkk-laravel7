@extends('layouts.master_admin')

@section('content')
<div class="row my-3">
    <div class="col-md-6">
		<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}"><i class="fas fa-users-cog"></i> User Management</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-edit"></i> Edit Data User</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
        <h1>Form Edit Data Pegawai</h1>
	</div>
</div>

<div class="row my-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pegawai.update', $pegawai->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama user baru.." value="{{ $pegawai->nama_pegawai }}">
						@error('nama')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan username baru.." value="{{ $pegawai->user->username }}">
						@error('username')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email user baru.." value="{{ $pegawai->user->email }}">
						@error('email')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukkan NIP user baru.." value="{{ $pegawai->nip }}">
						@error('nip')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4" placeholder="Masukkan alamat user baru..">{{ $pegawai->alamat }}</textarea>
                        @error('alamat')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Role/User Level</label>
                        <select name="level" id="level" class="form-control" readonly>
                            <option value="3">3 - Pegawai</option>
                        </select>
                    </div>
                    <div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password user baru.." value="{{ bcrypt($pegawai->password) }}" readonly>
						@error('password')
						<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                    <div class="form-group text-right">
						<button type="submit" name="submit" class="btn btn-outline-success">Edit data pegawai!</button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
