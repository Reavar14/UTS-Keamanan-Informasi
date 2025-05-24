<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PendaftaranBeasiswa extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'program_beasiswa_id',
        'tanggal_daftar',
        'status',
        'file_persyaratan',
        'nilai_akademik'
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function programBeasiswa(): BelongsTo
    {
        return $this->belongsTo(ProgramBeasiswa::class, 'program_beasiswa_id');
    }
}    
