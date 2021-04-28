<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    public const ROLE_ADMIN = 0;
    public const ROLE_SP_ADMIN = 1;

    public const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_SP_ADMIN => 'Supper admin',
    ];

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
