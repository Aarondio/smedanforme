<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Salesforcast;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalesforcastPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the salesforcast can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the salesforcast can view the model.
     */
    public function view(User $user, Salesforcast $model): bool
    {
        return true;
    }

    /**
     * Determine whether the salesforcast can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the salesforcast can update the model.
     */
    public function update(User $user, Salesforcast $model): bool
    {
        return true;
    }

    /**
     * Determine whether the salesforcast can delete the model.
     */
    public function delete(User $user, Salesforcast $model): bool
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
     * Determine whether the salesforcast can restore the model.
     */
    public function restore(User $user, Salesforcast $model): bool
    {
        return false;
    }

    /**
     * Determine whether the salesforcast can permanently delete the model.
     */
    public function forceDelete(User $user, Salesforcast $model): bool
    {
        return false;
    }
}
