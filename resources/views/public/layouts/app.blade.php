<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
            color: #333;
        }

        /* ── Navbar ── */
        .navbar-publik {
            background-color: #2c3e50;
            padding: 14px 0;
        }
        .navbar-publik .brand-title {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
            text-decoration: none;
            line-height: 1.2;
        }
        .navbar-publik .brand-sub {
            color: #aaa;
            font-size: 0.75rem;
        }
        .navbar-publik .nav-link {
            color: #ccc !important;
            font-size: 0.9rem;
            padding: 4px 12px !important;
            transition: color .2s;
        }
        .navbar-publik .nav-link:hover,
        .navbar-publik .nav-link.active {
            color: #fff !important;
        }

        /* ── Main wrapper ── */
        .main-wrapper {
            max-width: 960px;
            margin: 40px auto;
            padding: 0 16px;
        }

        /* ── Article card ── */
        .article-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 36px;
            box-shadow: 0 1px 4px rgba(0,0,0,.06);
        }
        .article-card img.cover {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }
        .article-card .card-body {
            padding: 20px 24px 24px;
        }
        .badge-kategori {
            background-color: #e8f5e9;
            color: #2e7d32;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 10px;
            text-decoration: none;
        }
        .article-card h2 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #1a1a2e;
        }
        .author-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            color: #666;
            margin-bottom: 12px;
        }
        .avatar-circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: #2c3e50;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .article-excerpt {
            font-size: 0.88rem;
            color: #555;
            line-height: 1.65;
            margin-bottom: 16px;
        }
        .btn-baca {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 6px 18px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s;
        }
        .btn-baca:hover {
            background-color: #388e3c;
            color: #fff;
        }

        /* ── Sidebar ── */
        .sidebar-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,.06);
            position: sticky;
            top: 24px;
        }
        .sidebar-card h6 {
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 14px;
            color: #1a1a2e;
        }
        .kategori-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            color: #333;
            text-decoration: none;
            margin-bottom: 4px;
            transition: background .15s;
        }
        .kategori-item:hover {
            background-color: #f0f0f0;
            color: #333;
        }
        .kategori-item.active {
            background-color: #4caf50;
            color: #fff;
            font-weight: 600;
        }
        .kategori-item .badge-count {
            font-size: 0.72rem;
            background-color: rgba(0,0,0,.12);
            border-radius: 10px;
            padding: 2px 8px;
            font-weight: 600;
        }
        .kategori-item.active .badge-count {
            background-color: rgba(255,255,255,.3);
        }

        /* ── Artikel Terkait ── */
        .terkait-item {
            display: flex;
            gap: 10px;
            margin-bottom: 14px;
            text-decoration: none;
            color: inherit;
        }
        .terkait-item img {
            width: 60px;
            height: 48px;
            object-fit: cover;
            border-radius: 5px;
            flex-shrink: 0;
        }
        .terkait-item .terkait-info .terkait-judul {
            font-size: 0.82rem;
            font-weight: 600;
            color: #1a1a2e;
            line-height: 1.35;
            margin-bottom: 3px;
        }
        .terkait-item:hover .terkait-judul {
            color: #4caf50;
        }
        .terkait-item .terkait-tgl {
            font-size: 0.74rem;
            color: #999;
        }

        /* ── Detail page ── */
        .detail-cover {
            width: 100%;
            max-height: 380px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        .breadcrumb-publik {
            font-size: 0.82rem;
            margin-bottom: 16px;
        }
        .breadcrumb-publik a {
            color: #4caf50;
            text-decoration: none;
        }
        .breadcrumb-publik a:hover { text-decoration: underline; }
        .breadcrumb-publik span { color: #999; margin: 0 6px; }
        .detail-judul {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 12px;
            line-height: 1.3;
        }
        .detail-isi {
            font-size: 0.93rem;
            line-height: 1.8;
            color: #444;
            margin-top: 20px;
        }
        .detail-isi p { margin-bottom: 16px; }

        /* ── Footer ── */
        .footer-publik {
            background-color: #2c3e50;
            color: #aaa;
            text-align: center;
            padding: 20px;
            font-size: 0.82rem;
            margin-top: 60px;
        }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav class="navbar-publik">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('publik.index') }}" class="brand-title">
            Blog Kami<br>
            <span class="brand-sub">Artikel terbaru seputar Kehidupan</span>
        </a>
        <div class="d-flex gap-1">
            <a href="{{ route('publik.index') }}" class="nav-link {{ request()->routeIs('publik.index') && !request()->has('kategori') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('publik.artikel') }}" class="nav-link {{ request()->routeIs('publik.artikel') ? 'active' : '' }}">Artikel</a>
            <a href="{{ route('publik.kategori') }}" class="nav-link {{ request()->routeIs('publik.kategori') ? 'active' : '' }}">Kategori</a>
            <a href="{{ route('publik.tentang') }}" class="nav-link {{ request()->routeIs('publik.tentang') ? 'active' : '' }}">Tentang</a>
        </div>
    </div>
</nav>

{{-- Content --}}
@yield('content')

{{-- Footer --}}
<footer class="footer-publik">
    © {{ date('Y') }} Blog Kami. Seluruh hak cipta dilindungi.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


