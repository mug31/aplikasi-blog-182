@extends('public.layouts.app')
@section('title', 'Semua Artikel - Blog Kami')
@section('content')
<div class="main-wrapper">
    <div class="row g-4">
        <div class="col-lg-8">
            <h5 class="mb-4 fw-bold">
                {{ $kategoriAktif ? 'Artikel: ' . $kategoriAktif->nama_kategori : 'Semua Artikel' }}
            </h5>
            @forelse($artikel as $a)
            <div class="article-card">
                <img src="{{ asset('storage/gambar/' . $a->gambar) }}" alt="{{ $a->judul }}" class="cover"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div style="display:none; width:100%; height:260px; background:#e9ecef;
                            align-items:center; justify-content:center; color:#aaa; font-size:.85rem;">
                    📷 Gambar tidak tersedia
                </div>
                <div class="card-body">
                    <a href="{{ route('publik.artikel', ['kategori' => $a->id_kategori]) }}" class="badge-kategori">
                        {{ $a->kategori->nama_kategori ?? '-' }}
                    </a>
                    <h2>{{ $a->judul }}</h2>
                    <div class="author-row">
                        <div class="avatar-circle">
                            {{ strtoupper(substr($a->penulis->nama_depan ?? 'U', 0, 1)) }}
                        </div>
                        <span>{{ ($a->penulis->nama_depan ?? '') . ' ' . ($a->penulis->nama_belakang ?? '') }}</span>
                        <span>•</span>
                        <span>{{ $a->hari_tanggal }}</span>
                    </div>
                    <p class="article-excerpt">{{ Str::limit(strip_tags($a->isi), 180) }}</p>
                    <a href="{{ route('publik.detail', $a->id) }}" class="btn-baca">Baca Selengkapnya →</a>
                </div>
            </div>
            @empty
            <p class="text-muted">Belum ada artikel.</p>
            @endforelse
        </div>
        <div class="col-lg-4">
            <div class="sidebar-card">
                <h6>Kategori Artikel</h6>
                <a href="{{ route('publik.artikel') }}"
                   class="kategori-item {{ !request()->has('kategori') ? 'active' : '' }}">
                    <span>Semua Artikel</span>
                    <span class="badge-count">{{ $kategoriList->sum('artikel_count') }}</span>
                </a>
                @foreach($kategoriList as $k)
                <a href="{{ route('publik.artikel', ['kategori' => $k->id]) }}"
                   class="kategori-item {{ request('kategori') == $k->id ? 'active' : '' }}">
                    <span>{{ $k->nama_kategori }}</span>
                    <span class="badge-count">{{ $k->artikel_count }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection