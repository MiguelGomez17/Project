<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'type', 'email_verified_at'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
