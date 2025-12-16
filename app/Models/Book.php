<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // sesuaikan dengan nama tabel kamu (kalau default "books" boleh dihapus)
    protected $table = 'books';

    // SESUAIKAN KOLOM DENGAN MIGRATION KAMU
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'category_id',
        'file_path',
        'hit_count',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
