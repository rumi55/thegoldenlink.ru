<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class RolePolicy extends BasePolicy
{
    public function before(User $user, ?string $ability = null): ?bool
    {
        if ($ability == 'delete' || $ability == 'deleteAny') {
            return null;
        }

        return true;
    }

    public function delete(User $user, ?Model $model = null): bool
    {
        if (in_array($model->id, [1, 2])) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        return parent::delete($user, $model);
    }

    public function deleteAny(User $user)
    {
        return false;
    }
}
