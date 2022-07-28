<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use App\Models\Role;
use Filament\Resources\Pages\CreateRecord;
use Spatie\Permission\PermissionRegistrar;

class CreateRole extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = RoleResource::class;

    protected function afterCreate(): void
    {
        if (!$this->record instanceof Role) {
            return;
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
