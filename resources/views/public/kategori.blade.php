@extends('public.layouts.app')
@section('title', 'Kategori - Blog Kami')
@section('content')
<div class="main-wrapper">
    <h5 class="mb-4 fw-bold">Semua Kategori</h5>
    <div class="row g-3">
        @forelse($kategoriList as $k)
        <div class="col-md-4">
            <a href="{{ route('publik.artikel', ['kategori' => $k->id]) }}"
               style="text-decoration:none;">
                <div class="sidebar-card" style="transition:.2s;" 
                     onmouseover="this.style.borderLeft='4px solid #4caf50'"
                     onmouseout="this.style.borderLeft='none'">
                    <h6 class="mb-1">{{ $k->nama_kategori }}</h6>
                    <small class="text-muted">{{ $k->artikel_count }} artikel</small>
                    @if($k->keterangan)
                        <p style="font-size:.82rem; color:#666; margin-top:8px; margin-bottom:0;">
                            {{ $k->keterangan }}
                        </p>
                    @endif
                </div>
            </a>
        </div>
        @empty
        <p class="text-muted">Belum ada kategori.</p>
        @endforelse
    </div>
</div>
@endsection