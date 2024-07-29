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

    protected $primaryKey = 'id_loan';

    public function book()
    {
        return $this->belongsTo(Book::class, 'book', 'id_book');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client', 'id_client');
    }
}
