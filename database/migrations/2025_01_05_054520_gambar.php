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
        // Gambar table
        Schema::create('gambar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kos_id')->constrained('kos')->onDelete('cascade');
            $table->string('foto_kost');
            $table->string('foto_kamar');
            $table->string('foto_kamar_mandi');
            $table->string('foto_fasilitas_bersama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar');
    }
};
