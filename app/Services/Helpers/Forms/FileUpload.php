<?php

declare(strict_types=1);

namespace App\Services\Helpers\Forms;

class FileUpload
{
    public static function imageForEventView(): \Filament\Forms\Components\FileUpload
    {
        return \Filament\Forms\Components\FileUpload::make('image')
            ->directory(function () {
                return 'events/views/' . data_get(func_get_arg(4), 'id', 0);
            })
            ->image()
            ->label(__('Image'));
    }
}
