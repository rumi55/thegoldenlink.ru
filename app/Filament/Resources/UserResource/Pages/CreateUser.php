<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = UserResource::class;
}
