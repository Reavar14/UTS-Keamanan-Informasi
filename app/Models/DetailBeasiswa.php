<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Model;

class DetailBeasiswa extends Model
{
    protected $fillable = ['program_beasiswa_id', 'syarat', 'kontak', 'informasi_tambahan'];

    public function programBeasiswa(): BelongsTo
    {
        return $this->belongsTo(ProgramBeasiswa::class, 'program_beasiswa_id');
    }
}
