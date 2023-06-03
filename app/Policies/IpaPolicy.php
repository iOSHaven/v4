<?php

namespace App\Policies;

use App\Models\Ipa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IpaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any ipas.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can view the ipa.
     *
     * @return mixed
     */
    public function view(User $user, Ipa $ipa)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can create ipas.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can update the ipa.
     *
     * @return mixed
     */
    public function update(User $user, Ipa $ipa)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can delete the ipa.
     *
     * @return mixed
     */
    public function delete(User $user, Ipa $ipa)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can restore the ipa.
     *
     * @return mixed
     */
    public function restore(User $user, Ipa $ipa)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can permanently delete the ipa.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Ipa $ipa)
    {
        return $user->isAdmin;
    }
}
