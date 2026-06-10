@extends('public.layouts.app')

@section('title', $artikel->judul . ' - Blog Kami')

@section('content')
<div class="main-wrapper">
    <div class="row g-4">

        {{-- ── Kolom Kiri: Isi Artikel ── --}}
        <div class="col-lg-8">

            {{-- Breadcrumb --}}
            <div class="breadcrumb-publik">
                <a href="{{ route('publik.index') }}">Beranda</a>
                <span>/</span>
                <a href="{{ route('publik.index', ['kategori' => $artikel->id_kategori]) }}">
                    {{ $artikel->kategori->nama_kategori ?? '-' }}
                </a>
                <span>/</span>
                <span style="color:#555;">{{ Str::limit($artikel->judul, 40) }}</span>
            </div>

            {{-- Gambar Cover --}}
            <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" 
                alt="{{ $artikel->judul }}" 
                class="cover"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div style="display:none; width:100%; height:260px; background:#e9ecef; 
                        align-items:center; justify-content:center; color:#aaa; font-size:.85rem;">
                 Gambar tidak tersedia
            </div>
            {{-- Badge Kategori --}}
            <a href="{{ route('publik.index', ['kategori' => $artikel->id_kategori]) }}" class="badge-kategori">
                {{ $artikel->kategori->nama_kategori ?? '-' }}
            </a>

            {{-- Judul --}}
            <h1 class="detail-judul">{{ $artikel->judul }}</h1>

            {{-- Author Row --}}
            <div class="author-row" style="margin-bottom: 0;">
                <div class="avatar-circle" style="width:34px;height:34px;font-size:.85rem;">
                    {{ strtoupper(substr($artikel->penulis->nama_depan ?? 'U', 0, 1)) }}
                </div>
                <div>
                    <div style="font-weight:600;font-size:.88rem;color:#1a1a2e;">
                        {{ ($artikel->penulis->nama_depan ?? '') . ' ' . ($artikel->penulis->nama_belakang ?? '') }}
                    </div>
                    <div style="font-size:.78rem;color:#999;">
                        {{ $artikel->hari_tanggal }}
                        {{ '' }}
                    </div>
                </div>
            </div>

            {{-- Isi Artikel --}}
            <div class="detail-isi">
                {!! nl2br(e($artikel->isi)) !!}
            </div>

            {{-- Kembali ke Beranda --}}
            <div class="mt-4 pt-2">
                <a href="{{ route('publik.index') }}" class="btn-baca" style="display:inline-block;">
                    ← Kembali ke Beranda
                </a>
            </div>

        </div>

        {{-- ── Kolom Kanan: Sidebar Artikel Terkait ── --}}
        <div class="col-lg-4">
            <div class="sidebar-card">
                <h6>Artikel Terkait</h6>

                @forelse($artikelTerkait as $t)
                <a href="{{ route('publik.detail', $t->id) }}" class="terkait-item">
                    <img src="{{ asset('storage/gambar/' . $t->gambar) }}" 
                        alt="{{ $t->judul }}" 
                        class="cover"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display:none; width:100%; height:260px; background:#e9ecef; 
                                align-items:center; justify-content:center; color:#aaa; font-size:.85rem;">
                         Gambar tidak tersedia
                    </div>
                    <div class="terkait-info">
                        <div class="terkait-judul">{{ Str::limit($t->judul, 55) }}</div>
                        <div class="terkait-tgl">
                            {{ $t->hari_tanggal }}
                        </div>
                    </div>
                </a>
                @empty
                <p class="text-muted" style="font-size:.83rem;">
                    Tidak ada artikel terkait.
                </p>
                @endforelse

            </div>
        </div>

    </div>
</div>
@endsection
