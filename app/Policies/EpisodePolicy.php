<?php

namespace App\Policies;

use App\Models\Episode;
use App\Models\User;
use App\Traits\AdminAllowAll;
use Illuminate\Auth\Access\HandlesAuthorization;

class EpisodePolicy
{
    use HandlesAuthorization;
    use AdminAllowAll;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Episode $episode): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Episode $episode): bool
    {
        return false;
    }

    public function delete(User $user, Episode $episode): bool
    {
        return false;
    }

    public function restore(User $user, Episode $episode): bool
    {
        return false;
    }

    public function forceDelete(User $user, Episode $episode): bool
    {
        return false;
    }
}
