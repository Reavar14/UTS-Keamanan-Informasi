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
        Schema::create('detail_beasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_beasiswa_id')->constrained()->onDelete('cascade');
            $table->text('syarat')->nullable();
            $table->string('kontak');
            $table->text('informasi_tambahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_beasiswas');
    }
};
