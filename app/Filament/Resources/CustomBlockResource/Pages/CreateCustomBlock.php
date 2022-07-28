<?php

namespace App\Filament\Resources\CustomBlockResource\Pages;

use App\Filament\Resources\CustomBlockResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomBlock extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = CustomBlockResource::class;
}
