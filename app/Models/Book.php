<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kelas',
        'file_path',
        'cover_path',
        'hit_count',
        'jumlah_akses',
        'jumlah_unduh',
        'is_active',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function downloadLogs()
    {
        return $this->hasMany(DownloadLog::class);
    }
    

}

