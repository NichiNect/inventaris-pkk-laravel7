<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = "petugas";

    protected $fillable = [
        'user_id', 'nama_petugas'
    ];
    
    /**
     * Relation with `users` table in `User` model.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * Relation with `inventaris` table in `Inventaris` model.
     */
    public function inventaris()
    {
        return $this->hasMany(\App\Models\Inventaris::class, 'petugas_id', 'id');
    }
}
