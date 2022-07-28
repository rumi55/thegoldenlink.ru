<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use App\Filament\Traits\ClearEventsBeforeCreate;
use Filament\Resources\Pages\CreateRecord;

class CreateTeacher extends CreateRecord
{
    use ClearEventsBeforeCreate;

    protected static string $resource = TeacherResource::class;
}
