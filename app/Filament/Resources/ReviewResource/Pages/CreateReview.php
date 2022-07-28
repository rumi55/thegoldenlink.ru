<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateReview extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = ReviewResource::class;
}
