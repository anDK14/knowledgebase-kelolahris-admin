<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ContentsMobileFeature;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentsMobileFeaturePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ContentsMobileFeature');
    }

    public function view(AuthUser $authUser, ContentsMobileFeature $contentsMobileFeature): bool
    {
        return $authUser->can('View:ContentsMobileFeature');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ContentsMobileFeature');
    }

    public function update(AuthUser $authUser, ContentsMobileFeature $contentsMobileFeature): bool
    {
        return $authUser->can('Update:ContentsMobileFeature');
    }

    public function delete(AuthUser $authUser, ContentsMobileFeature $contentsMobileFeature): bool
    {
        return $authUser->can('Delete:ContentsMobileFeature');
    }

    public function restore(AuthUser $authUser, ContentsMobileFeature $contentsMobileFeature): bool
    {
        return $authUser->can('Restore:ContentsMobileFeature');
    }

    public function forceDelete(AuthUser $authUser, ContentsMobileFeature $contentsMobileFeature): bool
    {
        return $authUser->can('ForceDelete:ContentsMobileFeature');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ContentsMobileFeature');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ContentsMobileFeature');
    }

    public function replicate(AuthUser $authUser, ContentsMobileFeature $contentsMobileFeature): bool
    {
        return $authUser->can('Replicate:ContentsMobileFeature');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ContentsMobileFeature');
    }

}