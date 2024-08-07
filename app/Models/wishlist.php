<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_wishlist';

    protected $fillable = ['book', 'client', 'date_added'];


    
    public function getBookAttribute()
    {
        return Book::find($this->attributes['book']);
    }

    public function getClientAttribute()
    {
        return Client::find($this->attributes['client']);
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book', 'id_book');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client', 'id_client');
    }

}

