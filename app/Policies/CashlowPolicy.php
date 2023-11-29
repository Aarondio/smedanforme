<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cashlow;
use Illuminate\Auth\Access\HandlesAuthorization;

class CashlowPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cashlow can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the cashlow can view the model.
     */
    public function view(User $user, Cashlow $model): bool
    {
        return true;
    }

    /**
     * Determine whether the cashlow can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the cashlow can update the model.
     */
    public function update(User $user, Cashlow $model): bool
    {
        return true;
    }

    /**
     * Determine whether the cashlow can delete the model.
     */
    public function delete(User $user, Cashlow $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the cashlow can restore the model.
     */
    public function restore(User $user, Cashlow $model): bool
    {
        return false;
    }

    /**
     * Determine whether the cashlow can permanently delete the model.
     */
    public function forceDelete(User $user, Cashlow $model): bool
    {
        return false;
    }
}
