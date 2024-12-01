<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostsPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Posts $posts): bool
    {
        return $user->id === $posts->author_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Posts $posts): bool
    {
        return $user->id === $posts->author_id;
    }

}
