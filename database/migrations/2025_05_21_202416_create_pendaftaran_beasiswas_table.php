<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran_beasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('program_beasiswa_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_daftar');
            $table->enum('status', ['diajukan', 'diterima', 'ditolak'])->default('diajukan');
            $table->string('file_persyaratan')->nullable();
            $table->decimal('nilai_akademik', 4, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_beasiswas');
    }
};
