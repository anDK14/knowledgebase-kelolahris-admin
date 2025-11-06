<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MobileFeature;
use Illuminate\Auth\Access\HandlesAuthorization;

class MobileFeaturePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MobileFeature');
    }

    public function view(AuthUser $authUser, MobileFeature $mobileFeature): bool
    {
        return $authUser->can('View:MobileFeature');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MobileFeature');
    }

    public function update(AuthUser $authUser, MobileFeature $mobileFeature): bool
    {
        return $authUser->can('Update:MobileFeature');
    }

    public function delete(AuthUser $authUser, MobileFeature $mobileFeature): bool
    {
        return $authUser->can('Delete:MobileFeature');
    }

    public function restore(AuthUser $authUser, MobileFeature $mobileFeature): bool
    {
        return $authUser->can('Restore:MobileFeature');
    }

    public function forceDelete(AuthUser $authUser, MobileFeature $mobileFeature): bool
    {
        return $authUser->can('ForceDelete:MobileFeature');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MobileFeature');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MobileFeature');
    }

    public function replicate(AuthUser $authUser, MobileFeature $mobileFeature): bool
    {
        return $authUser->can('Replicate:MobileFeature');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MobileFeature');
    }

}