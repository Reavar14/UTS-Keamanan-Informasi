<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramBeasiswa extends Model
{
    protected $fillable = ['nama_program', 'jenis', 'penyelenggara'];

    public function detail(): HasOne
    {
        return $this->hasOne(DetailBeasiswa::class);
    }

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(PendaftaranBeasiswa::class);
    }
}
