<?php

namespace App\Policies;

use App\Models\App;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any apps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can view the app.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\App  $app
     * @return mixed
     */
    public function view(User $user, App $app)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can create apps.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can update the app.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\App  $app
     * @return mixed
     */
    public function update(User $user, App $app)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can delete the app.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\App  $app
     * @return mixed
     */
    public function delete(User $user, App $app)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can restore the app.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\App  $app
     * @return mixed
     */
    public function restore(User $user, App $app)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can permanently delete the app.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\App  $app
     * @return mixed
     */
    public function forceDelete(User $user, App $app)
    {
        return $user->isAdmin;
    }
}
