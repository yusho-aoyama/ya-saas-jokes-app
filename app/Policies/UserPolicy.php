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
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Originally the user route is for only staff, admin, super admin, but just in case
        // Identify here who can access the create page...)
        return $user->hasAnyRole(['super-admin', 'admin', 'staff']);

        // So this allows only staff/admin/super-admin to access the create page

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $loggedInUser, User $targetUser): bool
    {
        // just make it easy to understand, I've  changed some...
        // loggedInUser: who is trying to edit
        // targetUsr: the target of edit action

        if ($loggedInUser->hasRole('super-user')) {
            return true; // super-admin can edit all
        }

        if ($loggedInUser->hasRole('admin')) {
            // admin can edit all except for super-admin
            return $targetUser->hasRole(['admin','staff','client']) && !$targetUser->hasRole('super-user');
        }

        if ($loggedInUser->hasRole('staff')) {
            // staff can edit only client and staff level
            return $targetUser->hasRole('client') || $loggedInUser->id === $targetUser->id;
        }

//        if ($loggedInUser->hasRole('client')) {
//            // client can only edit their own profile
//            return $loggedInUser->id === $targetUser->id;
//        }

        return false;
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $loggedInUser, User $targetUser): bool
    {
        // The loggedInUser can delete own profile
        if ($loggedInUser->id === $targetUser->id) {
            return true;
        }

        // super-admin can't be deleted at all
        if ($targetUser->hasRole('super-user')) {
            return false;
        }

        // super-admin can delete all except for super-admin
        if ($loggedInUser->hasRole('super-user')) {
            return true; // 全員削除可能
        }

        if ($loggedInUser->hasRole('admin')) {
            return $targetUser->hasRole('staff') || $targetUser->hasRole('client') ||
                $targetUser->hasRole('admin');
        }

        if ($loggedInUser->hasRole('staff')) {
            return $targetUser->hasRole('client', 'staff');
        }

        // それ以外は削除不可
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
