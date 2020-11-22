<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = "Jenis";

    protected $fillable = [
        'nama_jenis', 'kode_jenis', 'keterangan'
    ];

    /**
     * Relation with `inventaris` table in `Inventaris` model.
     */
    public function inventaris()
    {
        return $this->hasMany(\App\Models\inventaris::class, 'jenis_id', 'id');
    }
}
