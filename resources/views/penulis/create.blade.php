@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Tambah Penulis</h5>
    <a href="{{ route('penulis.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Depan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror"
                           placeholder="Masukkan nama depan" value="{{ old('nama_depan') }}">
                    @error('nama_depan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Belakang <span class="text-danger">*</span></label>
                    <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror"
                           placeholder="Masukkan nama belakang" value="{{ old('nama_belakang') }}">
                    @error('nama_belakang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror"
                       placeholder="Masukkan username" value="{{ old('user_name') }}">
                @error('user_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="Masukkan password (minimal 8 karakter)">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Profil</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                       accept="image/jpg,image/jpeg,image/png">
                <small class="text-muted">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal 2 MB. Jika tidak diunggah, foto default akan digunakan.</small>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('penulis.index') }}" class="btn btn-sm"
                   style="background-color: #f0f0f0; color: #555555;">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
