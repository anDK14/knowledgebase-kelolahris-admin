<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ContentsWebsiteFeature;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentsWebsiteFeaturePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ContentsWebsiteFeature');
    }

    public function view(AuthUser $authUser, ContentsWebsiteFeature $contentsWebsiteFeature): bool
    {
        return $authUser->can('View:ContentsWebsiteFeature');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ContentsWebsiteFeature');
    }

    public function update(AuthUser $authUser, ContentsWebsiteFeature $contentsWebsiteFeature): bool
    {
        return $authUser->can('Update:ContentsWebsiteFeature');
    }

    public function delete(AuthUser $authUser, ContentsWebsiteFeature $contentsWebsiteFeature): bool
    {
        return $authUser->can('Delete:ContentsWebsiteFeature');
    }

    public function restore(AuthUser $authUser, ContentsWebsiteFeature $contentsWebsiteFeature): bool
    {
        return $authUser->can('Restore:ContentsWebsiteFeature');
    }

    public function forceDelete(AuthUser $authUser, ContentsWebsiteFeature $contentsWebsiteFeature): bool
    {
        return $authUser->can('ForceDelete:ContentsWebsiteFeature');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ContentsWebsiteFeature');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ContentsWebsiteFeature');
    }

    public function replicate(AuthUser $authUser, ContentsWebsiteFeature $contentsWebsiteFeature): bool
    {
        return $authUser->can('Replicate:ContentsWebsiteFeature');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ContentsWebsiteFeature');
    }

}