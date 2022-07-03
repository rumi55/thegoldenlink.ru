<?php

declare(strict_types=1);

namespace App\Filament\Helpers;

use Filament\Forms\Components\Field;

class LangField
{
    public static function from(Field $field): array
    {
        $column = $field->getName();

        $ru = clone $field;
        $en = clone $field;

        return [
            $ru->name("{$column}.ru")->statePath("{$column}.ru")->ruHelp(),
            $en->name("{$column}.en")->statePath("{$column}.en")->enHelp(),
        ];
    }

    /**
     * @param array<Field> $fields
     * @return array
     */
    public static function fromArray(array $fields): array
    {
        $data = [];

        foreach ($fields as $field) {
            foreach (static::from($field) as $langField) {
                $data[] = $langField;
            }
        }

        return $data;
    }
}
