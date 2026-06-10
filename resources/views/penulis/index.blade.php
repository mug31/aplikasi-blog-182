@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Data Penulis</h5>
    <a href="{{ route('penulis.create') }}" class="btn btn-success btn-sm">+ Tambah Penulis</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-light">
                <tr>
                    <th>FOTO</th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penulis as $p)
                <tr>
                    <td>
                        <img src="{{ asset('storage/foto/' . $p->foto) }}" width="40" height="40"
                             class="rounded-circle" style="object-fit:cover;">
                    </td>
                    <td>{{ $p->nama_depan }} {{ $p->nama_belakang }}</td>
                    <td>{{ $p->user_name }}</td>
                    <td>
                        <a href="{{ route('penulis.edit', $p->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('penulis.destroy', $p->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus penulis ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada data penulis.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
