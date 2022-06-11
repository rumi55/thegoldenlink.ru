<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @property Model $record
 */
class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function afterCreate()
    {
        // @todo Костыль из-за непонятного бага, запрос на insert всегда возвращает id = 0, т.к летит сразу какой-то селект
        $this->record->id = DB::getRawPdo()->query('Select LAST_INSERT_ID() as id')->fetchObject()->id;
    }
}
