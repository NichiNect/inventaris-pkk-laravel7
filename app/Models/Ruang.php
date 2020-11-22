<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = "ruang";

    protected $fillable = [
        'nama_ruang', 'kode_ruang', 'keterangan'
    ];

    /**
     * Relation with `inventaris` table in `Inventaris` model.
     */
    public function inventaris()
    {
        return $this->hasMany(\App\Models\Inventaris::class, 'ruang_id', 'id');
    }
}
