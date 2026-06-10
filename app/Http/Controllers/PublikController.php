<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    public function index(Request $request)
    {
        $kategoriList = KategoriArtikel::withCount('artikel')->orderBy('nama_kategori', 'asc')->get();

        $query = Artikel::with(['kategori', 'penulis'])->orderBy('hari_tanggal', 'desc');

        $kategoriAktif = null;
        if ($request->has('kategori') && $request->kategori !== '') {
            $query->where('id_kategori', $request->kategori);
            $kategoriAktif = KategoriArtikel::find($request->kategori);
        }

        $artikel = $query->take(5)->get();

        return view('public.index', compact('artikel', 'kategoriList', 'kategoriAktif'));
    }

    public function detail($id)
    {
        $artikel = Artikel::with(['kategori', 'penulis'])->findOrFail($id);

        $artikelTerkait = Artikel::with(['kategori', 'penulis'])
            ->where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('hari_tanggal', 'desc')
            ->take(5)
            ->get();

        return view('public.detail', compact('artikel', 'artikelTerkait'));
    }
    public function artikel(Request $request)
    {
        $kategoriList = KategoriArtikel::withCount('artikel')->orderBy('nama_kategori', 'asc')->get();

        $query = Artikel::with(['kategori', 'penulis'])->orderBy('hari_tanggal', 'desc');

        $kategoriAktif = null;
        if ($request->has('kategori') && $request->kategori !== '') {
            $query->where('id_kategori', $request->kategori);
            $kategoriAktif = KategoriArtikel::find($request->kategori);
        }

        $artikel = $query->get();

        return view('public.artikel', compact('artikel', 'kategoriList', 'kategoriAktif'));
    }

    public function kategori()
    {
        $kategoriList = KategoriArtikel::withCount('artikel')->orderBy('nama_kategori', 'asc')->get();
        return view('public.kategori', compact('kategoriList'));
    }

    public function tentang()
    {
        return view('public.tentang');
    }
}
