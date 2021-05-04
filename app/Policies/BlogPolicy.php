<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Blog $blog)
    {
        return $user->id == $blog->user_id;
    }

    public function delete(User $user, Blog $blog)
    {
        return $user->id == $blog->user_id;
    }
}
