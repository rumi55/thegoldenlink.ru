<?php

declare(strict_types=1);

namespace App\Filament\Helpers;

class LangField
{
    public static function from(\Filament\Forms\Components\Field $field): array
    {
        $column = $field->getName();

        $ru = clone $field;
        $en = clone $field;

        return [
            $ru->name("{$column}.ru")->statePath("{$column}.ru")->ruHelp(),
            $en->name("{$column}.en")->statePath("{$column}.en")->enHelp(),
        ];
    }
}
