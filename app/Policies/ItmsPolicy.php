<?php

namespace App\Policies;

use App\User;
use App\Itms;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItmsPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any itms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can view the itms.
     *
     * @param  \App\User  $user
     * @param  \App\Itms  $itms
     * @return mixed
     */
    public function view(User $user, Itms $itms)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can create itms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can update the itms.
     *
     * @param  \App\User  $user
     * @param  \App\Itms  $itms
     * @return mixed
     */
    public function update(User $user, Itms $itms)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can delete the itms.
     *
     * @param  \App\User  $user
     * @param  \App\Itms  $itms
     * @return mixed
     */
    public function delete(User $user, Itms $itms)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can restore the itms.
     *
     * @param  \App\User  $user
     * @param  \App\Itms  $itms
     * @return mixed
     */
    public function restore(User $user, Itms $itms)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can permanently delete the itms.
     *
     * @param  \App\User  $user
     * @param  \App\Itms  $itms
     * @return mixed
     */
    public function forceDelete(User $user, Itms $itms)
    {
        return $user->isAdmin;
    }
}
