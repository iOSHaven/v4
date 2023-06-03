<?php

namespace App\Policies;

use App\Models\Skin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkinPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any skins.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can view the skin.
     *
     * @return mixed
     */
    public function view(User $user, Skin $skin)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can create skins.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can update the skin.
     *
     * @return mixed
     */
    public function update(User $user, Skin $skin)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can delete the skin.
     *
     * @return mixed
     */
    public function delete(User $user, Skin $skin)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can restore the skin.
     *
     * @return mixed
     */
    public function restore(User $user, Skin $skin)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can permanently delete the skin.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Skin $skin)
    {
        return $user->isAdmin;
    }
}
