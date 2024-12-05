<?php

namespace App\Policies;

use App\Models\Comments;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentsPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comments $comments): bool
    {
       return $user->id === $comments->author_id || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comments $comments): bool
    {
        return $user->id === $comments->author_id || $user->is_admin;
    }
}
