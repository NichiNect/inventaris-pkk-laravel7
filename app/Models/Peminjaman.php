<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "peminjaman";

    protected $fillable = [
        'tanggal_pinjam', 'tanggal_kembali', 'status_peminjaman', 'pegawai_id'
    ];

    /**
     * Relation with `detail_pinjam` table in `DetailPinjam` model.
     */
    public function detail_pinjam()
    {
        return $this->hasMany(\App\Models\DetailPinjam::class, 'peminjaman_id', 'id');
    }

    /**
     * Relation with `pegawai` table in `Pegawai` model.
     */
    public function pegawai()
    {
        return $this->belongsTo(\App\Models\Pegawai::class, 'pegawai_id');
    }
}
