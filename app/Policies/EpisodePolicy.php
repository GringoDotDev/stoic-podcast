<?php

namespace App\Policies;

use App\Models\Episode;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EpisodePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, Episode $episode): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Episode $episode): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Episode $episode): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Episode $episode): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Episode $episode): bool
    {
        return $user->isAdmin();
    }
}
