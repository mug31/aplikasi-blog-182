@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Tambah Kategori Artikel</h5>
    <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror"
                       placeholder="Masukkan nama kategori" value="{{ old('nama_kategori') }}">
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                          placeholder="Masukkan keterangan kategori (opsional)" rows="3">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('kategori.index') }}" class="btn btn-sm"
                   style="background-color: #f0f0f0; color: #555555;">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
