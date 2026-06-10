@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Data Artikel</h5>
    <a href="{{ route('artikel.create') }}" class="btn btn-success btn-sm">+ Tambah Artikel</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-light">
                <tr>
                    <th>GAMBAR</th>
                    <th>JUDUL</th>
                    <th>KATEGORI</th>
                    <th>PENULIS</th>
                    <th>TANGGAL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikel as $a)
                <tr>
                    <td>
                        <img src="{{ asset('storage/gambar/' . $a->gambar) }}" width="60" height="45"
                             style="object-fit:cover; border-radius:4px;">
                    </td>
                    <td>{{ $a->judul }}</td>
                    <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $a->penulis->nama_depan ?? '-' }} {{ $a->penulis->nama_belakang ?? '' }}</td>
                    <td><>{{ $a->hari_tanggal }}</td>
                    <td>
                        <a href="{{ route('artikel.edit', $a->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('artikel.destroy', $a->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted">Belum ada data artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
