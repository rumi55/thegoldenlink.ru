<?php

namespace App\Filament\Resources\VenueResource\Pages;

use App\Filament\Resources\VenueResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateVenue extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = VenueResource::class;
}
