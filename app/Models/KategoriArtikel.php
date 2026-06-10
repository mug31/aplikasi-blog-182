<?php

// ============================================================
// PASTIKAN Model app/Models/KategoriArtikel.php
// sudah memiliki relasi berikut:
// ============================================================

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table = 'kategori_artikel';

    protected $fillable = ['nama_kategori', 'keterangan'];

    // Relasi ke Artikel (WAJIB ADA agar withCount('artikel') bisa bekerja)
    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_kategori', 'id');
    }
}
