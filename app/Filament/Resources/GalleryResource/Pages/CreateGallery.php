<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = GalleryResource::class;
}
