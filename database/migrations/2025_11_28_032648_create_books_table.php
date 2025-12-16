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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            // relasi ke kategori
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->onDelete('cascade');

            // data utama buku
            $table->string('judul');
            $table->string('penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('tahun_terbit', 4)->nullable();  // "2023", "2024"
            $table->string('kelas')->nullable();            // contoh: "VII", "VIII", "IX"

            // file fisik
            $table->string('file_path');        // lokasi file pdf di storage/public
            $table->string('cover_path')->nullable(); // cover gambar (optional)

            // statistik (untuk dashboard)
            $table->unsignedInteger('jumlah_akses')->default(0);   // berapa kali dibuka
            $table->unsignedInteger('jumlah_unduh')->default(0);   // berapa kali di-download

            // status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
