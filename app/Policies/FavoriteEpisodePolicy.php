<?php

namespace App\Policies;

use App\Models\FavoriteEpisode;
use App\Models\User;
use App\Traits\AdminAllowAll;
use Illuminate\Auth\Access\HandlesAuthorization;

class FavoriteEpisodePolicy
{
    use HandlesAuthorization;
    use AdminAllowAll;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, FavoriteEpisode $favoriteEpisode): bool
    {
        return $user->id === $favoriteEpisode->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, FavoriteEpisode $favoriteEpisode): bool
    {
        return $user->id === $favoriteEpisode->user_id;
    }

    public function delete(User $user, FavoriteEpisode $favoriteEpisode): bool
    {
        return $user->id === $favoriteEpisode->user_id;
    }

    public function restore(User $user, FavoriteEpisode $favoriteEpisode): bool
    {
        return $user->id === $favoriteEpisode->user_id;
    }

    public function forceDelete(User $user, FavoriteEpisode $favoriteEpisode): bool
    {
        return $user->id === $favoriteEpisode->user_id;
    }
}
