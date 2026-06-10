@extends('public.layouts.app')
@section('title', 'Tentang - Blog Kami')
@section('content')
<div class="main-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="article-card">
                <div class="card-body" style="padding:40px;">
                    <h2 style="font-size:1.6rem; font-weight:800; margin-bottom:20px;">Tentang Blog Kami</h2>
                    <p style="font-size:.93rem; line-height:1.8; color:#444;">
                        Blog Kami adalah platform berbagi artikel seputar teknologi, pemrograman, 
                        dan berbagai topik menarik lainnya. Dibangun dengan semangat berbagi 
                        pengetahuan kepada siapa saja yang ingin belajar dan berkembang.
                    </p>
                    <p style="font-size:.93rem; line-height:1.8; color:#444;">
                        Artikel-artikel di sini ditulis oleh para penulis berpengalaman yang 
                        passionate di bidangnya masing-masing. Kami berkomitmen untuk menyajikan 
                        konten yang berkualitas, mudah dipahami, dan bermanfaat.
                    </p>
                    <hr style="margin:24px 0;">
                    <div style="display:flex; gap:32px;">
                        <div>
                            <div style="font-size:1.4rem; font-weight:800; color:#4caf50;">
                                {{ \App\Models\Artikel::count() }}
                            </div>
                            <div style="font-size:.82rem; color:#888;">Total Artikel</div>
                        </div>
                        <div>
                            <div style="font-size:1.4rem; font-weight:800; color:#4caf50;">
                                {{ \App\Models\KategoriArtikel::count() }}
                            </div>
                            <div style="font-size:.82rem; color:#888;">Kategori</div>
                        </div>
                        <div>
                            <div style="font-size:1.4rem; font-weight:800; color:#4caf50;">
                                {{ \App\Models\Penulis::count() }}
                            </div>
                            <div style="font-size:.82rem; color:#888;">Penulis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection