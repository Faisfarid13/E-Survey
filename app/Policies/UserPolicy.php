<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasPermissionTo('Lihat Akun')) { //Apps always check for the permission not the role, so the role is unnecessary
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        if ($user->hasPermissionTo('Lihat Akun')) { 
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasPermissionTo('Buat Akun')) { 
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        if ($user->hasPermissionTo('Perbarui Akun')) { 
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        if ($user->hasPermissionTo('Hapus Akun')) { 
            return true;
        }
        return false;
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user): bool
    // {
    //     return $user->hasRole('Admin');
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user): bool
    // {
    //     return $user->hasRole('Admin');
    // }
}
