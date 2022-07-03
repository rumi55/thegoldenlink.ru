<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    protected function getPermissionPrefix(): string
    {
        return Str::camel(
            str_replace('Policy', '', class_basename($this))
        );
    }

    protected function getPermissionName(string $permission): string
    {
        return $this->getPermissionPrefix() . '.' . $permission;
    }

    protected function check(User $user, string $permission): bool
    {
        if ($user->hasPermissionTo($this->getPermissionName($permission))) {
            return true;
        }

        return false;
    }

    public function before(User $user, ?string $ability = null): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    public function view(User $user): bool
    {
        return $this->check($user, 'view');
    }

    public function viewAny(User $user): bool
    {
        return $this->check($user, 'view');
    }

    public function create(User $user): bool
    {
        return $this->check($user, 'create');
    }

    public function update(User $user): bool
    {
        return $this->check($user, 'update');
    }

    public function delete(User $user, ?Model $model = null): bool
    {
        return $this->check($user, 'delete');
    }

    public function deleteAny(User $user)
    {
        return $this->check($user, 'delete');
    }
}
