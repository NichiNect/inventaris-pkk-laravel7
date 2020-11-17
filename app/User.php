<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_id', 'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation with `level` table in `UserLevel` model.
     */
    public function level()
    {
        return $this->belongsTo(\App\Models\UserLevel::class, 'level_id', 'id');
    }

    /**
     * Relation with `pegawai` table in `Pegawai` model.
     */
    public function pegawai()
    {
        return $this->belongsTo(\App\Models\Pegawai::class, 'user_id', 'id');
    }

    /**
     * Relation with `petugas` table in `Petugas` model.
     */
    public function petugas()
    {
        return $this->belongsTo(\App\Models\Petugas::class, 'user_id', 'id');
    }
}
