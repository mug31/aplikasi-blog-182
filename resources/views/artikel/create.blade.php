@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Tambah Artikel</h5>
    <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       placeholder="Masukkan judul artikel" value="{{ old('judul') }}">
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ old('id_kategori') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis <span class="text-danger">*</span></label>
                <select name="id_penulis" class="form-select @error('id_penulis') is-invalid @enderror">
                    <option value="">Pilih Penulis</option>
                    @foreach($penulis as $p)
                        <option value="{{ $p->id }}" {{ old('id_penulis') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_depan }} {{ $p->nama_belakang }}
                        </option>
                    @endforeach
                </select>
                @error('id_penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
                <textarea name="isi" class="form-control @error('isi') is-invalid @enderror"
                          placeholder="Masukkan isi artikel" rows="6">{{ old('isi') }}</textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/jpg,image/jpeg,image/png">
                <small class="text-muted">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal 2 MB.</small>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('artikel.index') }}" class="btn btn-sm"
                   style="background-color: #f0f0f0; color: #555555;">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
