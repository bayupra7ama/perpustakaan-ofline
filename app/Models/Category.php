<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];

    public function books()
    {
        // sesuaikan foreign key & local key kalau beda
        return $this->hasMany(Book::class, 'category_id', 'id');
    }
}
