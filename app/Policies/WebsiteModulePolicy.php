<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\WebsiteModule;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebsiteModulePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:WebsiteModule');
    }

    public function view(AuthUser $authUser, WebsiteModule $websiteModule): bool
    {
        return $authUser->can('View:WebsiteModule');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:WebsiteModule');
    }

    public function update(AuthUser $authUser, WebsiteModule $websiteModule): bool
    {
        return $authUser->can('Update:WebsiteModule');
    }

    public function delete(AuthUser $authUser, WebsiteModule $websiteModule): bool
    {
        return $authUser->can('Delete:WebsiteModule');
    }

    public function restore(AuthUser $authUser, WebsiteModule $websiteModule): bool
    {
        return $authUser->can('Restore:WebsiteModule');
    }

    public function forceDelete(AuthUser $authUser, WebsiteModule $websiteModule): bool
    {
        return $authUser->can('ForceDelete:WebsiteModule');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:WebsiteModule');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:WebsiteModule');
    }

    public function replicate(AuthUser $authUser, WebsiteModule $websiteModule): bool
    {
        return $authUser->can('Replicate:WebsiteModule');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:WebsiteModule');
    }

}