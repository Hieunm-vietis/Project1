<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'content', 'image', 'user_id', 'id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
