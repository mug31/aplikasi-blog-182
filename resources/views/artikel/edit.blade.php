@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Edit Artikel</h5>
    <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul', $artikel->judul) }}">
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ old('id_kategori', $artikel->id_kategori) == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
                <textarea name="isi" class="form-control @error('isi') is-invalid @enderror"
                          rows="6">{{ old('isi', $artikel->isi) }}</textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label><br>
                <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" height="80"
                     class="mb-2" style="object-fit:cover; border-radius:4px;">
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                       accept="image/jpg,image/jpeg,image/png">
                <small class="text-muted">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal 2 MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('artikel.index') }}" class="btn btn-sm"
                   style="background-color: #f0f0f0; color: #555555;">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
