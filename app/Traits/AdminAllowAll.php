<?php

namespace App\Traits;

use App\Models\User;

trait AdminAllowAll
{
    public function before(User $user, string $ability): bool|null
    {
        return $user->isAdmin() ? true : null;
    }
}
