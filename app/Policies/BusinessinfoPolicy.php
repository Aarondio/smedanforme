<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Businessinfo;
use Illuminate\Auth\Access\HandlesAuthorization;

class BusinessinfoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the businessinfo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the businessinfo can view the model.
     */
    public function view(User $user, Businessinfo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the businessinfo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the businessinfo can update the model.
     */
    public function update(User $user, Businessinfo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the businessinfo can delete the model.
     */
    public function delete(User $user, Businessinfo $model): bool
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
     * Determine whether the businessinfo can restore the model.
     */
    public function restore(User $user, Businessinfo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the businessinfo can permanently delete the model.
     */
    public function forceDelete(User $user, Businessinfo $model): bool
    {
        return false;
    }
}
