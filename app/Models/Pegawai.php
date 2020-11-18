<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";

    protected $fillable = [
        'user_id', 'nama_pegawai', 'nip', 'alamat', 'status'
    ];

    /**
     * Relation with `users` table in `User` model.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
