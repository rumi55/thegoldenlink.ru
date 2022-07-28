<?php

namespace App\Filament\Resources\MailingListResource\Pages;

use App\Filament\Resources\MailingListResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateMailingList extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = MailingListResource::class;
}
