<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_category';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'category', 'id_category');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image', 'id_image');
    }
}
