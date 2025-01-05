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
        Schema::create('spesifikasi_kos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kos_id')->constrained('kos')->onDelete('cascade');
            $table->string('room_size');
            $table->boolean('electricity');
            $table->boolean(column: 'ac');
            $table->boolean('bed');
            $table->boolean('wardrobe');
            $table->boolean('bathroom_inside');
            $table->boolean('wifi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spesifikasi_kos');
    }
};
