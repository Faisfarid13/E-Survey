<?php

namespace App\Policies;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SurveyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('Lihat Survei')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Survey $survey): bool
    {
        if($user->hasPermissionTo('Lihat Survei')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Buat Survei')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Survey $survey): bool
    {
        if($user->hasPermissionTo('Perbarui Survei')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Survey $survey): bool
    {
        if($user->hasPermissionTo('Hapus Survei')){
            return true;
        }
        return false;
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, Survey $survey): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Survey $survey): bool
    // {
    //     //
    // }
}
