<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_author';

    protected $fillable = [
        'name', 'lastname', 'birth_date', 'description', 'image'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author', 'id_author');
    }

    public function getImagePathAttribute()
    {
        return $this->image ? 'storage/images/authors/' . $this->image : 'storage/images/authors/default-image.jpg';
    }
}
