<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['judul', 'isi', 'gambar', 'id_kategori', 'id_penulis', 'hari_tanggal'];

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori', 'id');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis', 'id');
    }

    public $timestamps = false;
}