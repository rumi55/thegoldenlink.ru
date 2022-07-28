<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = EventResource::class;
}
