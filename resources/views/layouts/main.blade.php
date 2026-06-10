<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Blog (CMS)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            width: 220px;
            min-height: 100vh;
            background-color: #2c3e50;
            color: #fff;
            position: fixed;
            top: 0; left: 0;
        }
        .sidebar a { color: #ccc; text-decoration: none; display: block; padding: 10px 20px; }
        .sidebar a:hover, .sidebar a.active { background-color: #4caf50; color: #fff; }
        .sidebar .brand { background-color: #1a252f; padding: 15px 20px; font-weight: bold; }
        .sidebar .menu-label { font-size: 11px; color: #888; padding: 15px 20px 5px; text-transform: uppercase; }
        .sidebar .user-info { padding: 15px 20px; border-bottom: 1px solid #3d5166; }
        .sidebar .btn-keluar { background-color: #e74c3c; color: #fff; border: none; width: calc(100% - 40px); margin: 10px 20px; }
        .main-content { margin-left: 220px; padding: 30px; }
        .topbar { background-color: #2c3e50; color: #fff; padding: 10px 20px; margin-bottom: 20px; border-radius: 5px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="brand">Sistem Manajemen Blog (CMS)<br><small style="font-size:11px;color:#aaa;">db_blog</small></div>
    <div class="user-info">
        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama_depan ?? 'U' }}&background=4caf50&color=fff&size=40" class="rounded-circle" width="40">
        <div class="mt-2"><small>Halu,</small><br><strong>{{ Auth::user()->nama_depan ?? 'User' }}</strong></div>
    </div>
    <div class="menu-label">Menu Utama</div>
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('artikel.index') }}" class="{{ request()->routeIs('artikel.*') ? 'active' : '' }}">Kelola Artikel</a>
    <a href="{{ route('penulis.index') }}" class="{{ request()->routeIs('penulis.*') ? 'active' : '' }}">Kelola Penulis</a>
    <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">Kelola Kategori</a>
    <div style="position:absolute;bottom:0;width:100%;padding:10px 0;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-keluar btn">Keluar</button>
        </form>
    </div>
</div>

<div class="main-content">
    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
