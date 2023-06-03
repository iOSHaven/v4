<?php

namespace App\Policies;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any providers.
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can view the provider.
     *
     * @return mixed
     */
    public function view(User $user, Provider $provider)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can create providers.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can update the provider.
     *
     * @return mixed
     */
    public function update(User $user, Provider $provider)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can delete the provider.
     *
     * @return mixed
     */
    public function delete(User $user, Provider $provider)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can restore the provider.
     *
     * @return mixed
     */
    public function restore(User $user, Provider $provider)
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can permanently delete the provider.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Provider $provider)
    {
        return $user->isAdmin;
    }
}
