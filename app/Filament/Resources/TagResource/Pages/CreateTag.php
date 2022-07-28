<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = TagResource::class;
}
