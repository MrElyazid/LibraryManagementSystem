<?php

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Librarian extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'lastname', 'phone_number', 'password', 'email'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id_librarian';
}
