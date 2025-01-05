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
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom baru
            $table->string('role')->nullabet();  // Kolom 'role' dengan nilai default 'penyewa'
            $table->string('phone_number')->nullable();  // Kolom 'phone_number' yang boleh kosong
            $table->text('alamat')->nullable();  // Kolom 'alamat' yang bisa kosong
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();  // Kolom 'jenis_kelamin' dengan pilihan
            $table->date('tanggal_lahir')->nullable();  // Kolom 'tanggal_lahir' bertipe date yang bisa kosong
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom jika rollback
            $table->dropColumn('role');
            $table->dropColumn('phone_number');
            $table->dropColumn('alamat');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('tanggal_lahir');  // Menghapus kolom 'tanggal_lahir'
        });
    }
};
