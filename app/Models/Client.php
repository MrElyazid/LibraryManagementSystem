<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'is_student'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id_client';


    public function isLibrarian()
    {
        
        return DB::table('librarians')
            ->where('email', $this->email)
            ->where('password', $this->password)
            ->exists();
    }
    public function loans()
    {
        return $this->hasMany(Loan::class, 'client', 'id_client');
    }


    public function bookRelation()
{
    return $this->belongsTo(Book::class, 'book', 'id_book');
}

public function wishlists()
    {
        return $this->hasMany(wishlist::class, 'client', 'id_client');
    }


}
