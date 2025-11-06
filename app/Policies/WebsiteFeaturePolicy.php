<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\WebsiteFeature;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebsiteFeaturePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:WebsiteFeature');
    }

    public function view(AuthUser $authUser, WebsiteFeature $websiteFeature): bool
    {
        return $authUser->can('View:WebsiteFeature');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:WebsiteFeature');
    }

    public function update(AuthUser $authUser, WebsiteFeature $websiteFeature): bool
    {
        return $authUser->can('Update:WebsiteFeature');
    }

    public function delete(AuthUser $authUser, WebsiteFeature $websiteFeature): bool
    {
        return $authUser->can('Delete:WebsiteFeature');
    }

    public function restore(AuthUser $authUser, WebsiteFeature $websiteFeature): bool
    {
        return $authUser->can('Restore:WebsiteFeature');
    }

    public function forceDelete(AuthUser $authUser, WebsiteFeature $websiteFeature): bool
    {
        return $authUser->can('ForceDelete:WebsiteFeature');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:WebsiteFeature');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:WebsiteFeature');
    }

    public function replicate(AuthUser $authUser, WebsiteFeature $websiteFeature): bool
    {
        return $authUser->can('Replicate:WebsiteFeature');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:WebsiteFeature');
    }

}