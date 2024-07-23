<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_image';

    protected $fillable = [
        'path', // Assuming you have a path column or similar
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'image', 'id_image');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'image', 'id_image');
    }
}
