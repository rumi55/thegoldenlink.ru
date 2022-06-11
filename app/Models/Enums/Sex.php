<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum Sex: string
{
    case Male = 'M';
    case Female = 'F';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options()
    {
        return [
            'M' => __('Male'),
            'F' => __('Female'),
        ];
    }
}
