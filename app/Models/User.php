<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Blog;

class User extends Authenticatable
{
    use Notifiable;

    public const STATUS_VALID = 1;
    public const STATUS_INVALID = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'provider_name', 'provider_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'user_follow_id');
    }

    public function following()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_follow_id', 'user_id');
    }
}
