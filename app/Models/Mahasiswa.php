<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'nim', 'email', 'fakultas', 'prodi'];

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(PendaftaranBeasiswa::class);
    }
}
