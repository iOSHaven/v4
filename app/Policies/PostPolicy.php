<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function viewAny(User $user): bool
    {
        return $user->isAdmin;
    }

    public function view(User $user, Post $post): bool
    {
        return $user->isAdmin;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->isAdmin;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->isAdmin;
    }

    public function restore(User $user, Post $post): bool
    {
        return $user->isAdmin;
    }

    public function forceDelete(User $user, Post $post): bool
    {
        return $user->isAdmin;
    }
}