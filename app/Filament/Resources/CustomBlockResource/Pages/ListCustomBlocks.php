<?php

namespace App\Filament\Resources\CustomBlockResource\Pages;

use App\Filament\Resources\CustomBlockResource;
use Filament\Resources\Pages\ListRecords;

class ListCustomBlocks extends ListRecords
{
    protected static string $resource = CustomBlockResource::class;
}
