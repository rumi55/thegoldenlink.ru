<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\CityResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateCity extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = CityResource::class;
}
