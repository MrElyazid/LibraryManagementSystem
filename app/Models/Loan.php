<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'book', 'client', 'date_borrowed', 'due_date', 'return_date'
    ];


    protected $casts = [
        'date_borrowed' => 'datetime',
        'due_date' => 'datetime',
    ];


    
    protected $primaryKey = 'id_loan';

    // Define accessors for book and client
    public function getBookAttribute()
    {
        return Book::find($this->attributes['book']);
    }

    public function getClientAttribute()
    {
        return Client::find($this->attributes['client']);
    }

    // Keep the original relationship methods
    public function bookRelation()
    {
        return $this->belongsTo(Book::class, 'book', 'id_book');
    }

    public function clientRelation()
    {
        return $this->belongsTo(Client::class, 'client', 'id_client');
    }
}
