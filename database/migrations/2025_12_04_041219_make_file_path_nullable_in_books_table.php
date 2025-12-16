<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // ubah kolom file_path jadi boleh null
            $table->string('file_path')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // kalau rollback, balik lagi jadi NOT NULL (sesuai awalnya)
            $table->string('file_path')->nullable(false)->change();
        });
    }
};
