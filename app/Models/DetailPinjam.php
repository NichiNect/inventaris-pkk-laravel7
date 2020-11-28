<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    protected $table = "detail_pinjam";

    protected $fillable = [
        'jumlah', 'peminjaman_id', 'inventaris_id'
    ];

    /**
     * Relation with `peminjaman` table in `Peminjaman` model.
     */
    public function peminjaman()
    {
        return $this->belongsTo(\App\Models\Peminjaman::class, 'peminjaman_id', 'id');
    }

    /**
     * Relation with `inventaris` table in `Inventaris` model.
     */
    public function inventaris()
    {
        return $this->belongsTo(\App\Models\Inventaris::class, 'inventaris_id');
    }
}
