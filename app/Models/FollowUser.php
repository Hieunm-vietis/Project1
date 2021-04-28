<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    protected $table = 'follow_user';

    protected $fillable = [
        'user_id', 'user_follow_id'
    ];
}
