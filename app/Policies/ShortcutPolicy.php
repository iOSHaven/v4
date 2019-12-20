<?php

namespace App\Policies;

use App\User;
use App\Shortcut;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShortcutPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any shortcuts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the shortcut.
     *
     * @param  \App\User  $user
     * @param  \App\Shortcut  $shortcut
     * @return mixed
     */
    public function view(User $user, Shortcut $shortcut)
    {
        return $user->isAdmin || $shortcut->user->id == $user->id;
    }

    /**
     * Determine whether the user can create shortcuts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the shortcut.
     *
     * @param  \App\User  $user
     * @param  \App\Shortcut  $shortcut
     * @return mixed
     */
    public function update(User $user, Shortcut $shortcut)
    {
        return $user->isAdmin || $shortcut->user->id == $user->id;
    }

    /**
     * Determine whether the user can delete the shortcut.
     *
     * @param  \App\User  $user
     * @param  \App\Shortcut  $shortcut
     * @return mixed
     */
    public function delete(User $user, Shortcut $shortcut)
    {
        return $user->isAdmin || $shortcut->user->id == $user->id;
    }

    /**
     * Determine whether the user can restore the shortcut.
     *
     * @param  \App\User  $user
     * @param  \App\Shortcut  $shortcut
     * @return mixed
     */
    public function restore(User $user, Shortcut $shortcut)
    {
        return $user->isAdmin || $shortcut->user->id == $user->id;
    }

    /**
     * Determine whether the user can permanently delete the shortcut.
     *
     * @param  \App\User  $user
     * @param  \App\Shortcut  $shortcut
     * @return mixed
     */
    public function forceDelete(User $user, Shortcut $shortcut)
    {
        return $user->isAdmin;
    }
}
