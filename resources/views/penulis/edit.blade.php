@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Edit Penulis</h5>
    <a href="{{ route('penulis.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('penulis.update', $penulis->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Depan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror"
                           value="{{ old('nama_depan', $penulis->nama_depan) }}">
                    @error('nama_depan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Belakang <span class="text-danger">*</span></label>
                    <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror"
                           value="{{ old('nama_belakang', $penulis->nama_belakang) }}">
                    @error('nama_belakang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror"
                       value="{{ old('user_name', $penulis->user_name) }}">
                @error('user_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="Kosongkan jika tidak ingin mengubah password">
                <small class="text-muted">Minimal 8 karakter. Kosongkan jika tidak ingin mengubah password.</small>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Profil</label><br>
                <img src="{{ asset('storage/foto/' . $penulis->foto) }}" width="60" height="60"
                     class="rounded-circle mb-2" style="object-fit:cover;">
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                       accept="image/jpg,image/jpeg,image/png">
                <small class="text-muted">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal 2 MB. Kosongkan jika tidak ingin mengubah foto.</small>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('penulis.index') }}" class="btn btn-sm"
                   style="background-color: #f0f0f0; color: #555555;">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
