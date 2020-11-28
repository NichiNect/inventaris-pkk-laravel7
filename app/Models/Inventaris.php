<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = "inventaris";
    
    protected $fillable = [
        'nama', 'kondisi', 'keterangan', 'jumlah', 'tanggal_register', 'kode_inventaris', 'jenis_id', 'ruang_id', 'petugas_id'
    ];

    /**
     * Relation with `jenis` table in `Jenis` model.
     */
    public function jenis()
    {
        return $this->belongsTo(\App\Models\Jenis::class, 'jenis_id', 'id');
    }

    /**
     * Relation with `ruang` table in `Ruang` model.
     */
    public function ruang()
    {
        return $this->belongsTo(\App\Models\Ruang::class, 'ruang_id', 'id');
    }

    /**
     * Relation with `petugas` table in `Petugas` model.
     */
    public function petugas()
    {
        return $this->belongsTo(\App\Models\Petugas::class, 'petugas_id', 'id');
    }

    /**
     * Relation with `inventaris` table in `Inventaris` model.
     */
    public function detail_pinjam()
    {
        return $this->hasMany(\App\Models\DetailPinjam::class);
    }
}
