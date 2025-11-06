<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MobileModule;
use Illuminate\Auth\Access\HandlesAuthorization;

class MobileModulePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MobileModule');
    }

    public function view(AuthUser $authUser, MobileModule $mobileModule): bool
    {
        return $authUser->can('View:MobileModule');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MobileModule');
    }

    public function update(AuthUser $authUser, MobileModule $mobileModule): bool
    {
        return $authUser->can('Update:MobileModule');
    }

    public function delete(AuthUser $authUser, MobileModule $mobileModule): bool
    {
        return $authUser->can('Delete:MobileModule');
    }

    public function restore(AuthUser $authUser, MobileModule $mobileModule): bool
    {
        return $authUser->can('Restore:MobileModule');
    }

    public function forceDelete(AuthUser $authUser, MobileModule $mobileModule): bool
    {
        return $authUser->can('ForceDelete:MobileModule');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MobileModule');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MobileModule');
    }

    public function replicate(AuthUser $authUser, MobileModule $mobileModule): bool
    {
        return $authUser->can('Replicate:MobileModule');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MobileModule');
    }

}