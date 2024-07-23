<?php

// app/Models/Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_book';

    protected $fillable = [
        'isbn',
        'title',
        'category',
        'status',
        'quantity',
        'image', // This is the foreign key to the images table
        'author',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id_category');
    }

    public function imagePic()
    {
        return $this->belongsTo(Image::class, 'image', 'id_image'); // Correct relationship
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author', 'id_author');
    }
}
