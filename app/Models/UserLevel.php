<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = "level";

    /**
     * Relation with `users` table in `User` model.
     */
    public function users()
    {
        return $this->hasMany(\App\User::class, 'level_id', 'id');
    }
}
