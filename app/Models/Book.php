<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_book';

    protected $fillable = [
        'isbn', 'title', 'category', 'status', 'quantity', 'image', 'author', 'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id_category');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author', 'id_author');
    }

    public function getImagePathAttribute()
    {
        return $this->image ? 'storage/images/covers/' . $this->image : 'storage/images/covers/default-image.jpg';
    }

    public function getAuthorNameAttribute()
    {
        return $this->author()->first()->name;
    }
    
    public function getAuthorLastnameAttribute()
    {
        return $this->author()->first()->lastname;
    }
    
    public function getCategoryNameAttribute()
    {
        return $this->category()->first()->name;
    }

}
