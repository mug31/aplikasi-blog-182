@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Data Kategori Artikel</h5>
    <a href="{{ route('kategori.create') }}" class="btn btn-success btn-sm">+ Tambah Kategori</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-light">
                <tr>
                    <th>NO</th>
                    <th>NAMA KATEGORI</th>
                    <th>KETERANGAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $i => $k)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>{{ $k->keterangan }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada data kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
