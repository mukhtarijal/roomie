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
        // Kos table
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->integer('available_rooms');
            $table->enum('gender_kos', ['L', 'P', 'Campur']);
            $table->float('stars')->default(0); // Linked to reviews
            $table->decimal('price', 10, 2);
            $table->enum('status', [0, 1, 2, 3])->default(0); // 0=nonaktif, 1=full, 2=ready, 3=prioritas
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};
