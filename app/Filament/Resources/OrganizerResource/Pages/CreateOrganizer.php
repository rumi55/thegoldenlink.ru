<?php

namespace App\Filament\Resources\OrganizerResource\Pages;

use App\Filament\Resources\OrganizerResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganizer extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = OrganizerResource::class;
}
