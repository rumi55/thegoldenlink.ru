<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum Currency: string
{
    case RUB = 'RUB';
    case USD = 'USD';
    case EUR = 'EUR';
    case MXN = 'MXN';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options()
    {
        return [
            'RUB' => __('₽'),
            'EUR' => __('€'),
            'USD' => __('$'),
            'MXN' => __('Mex $'),
        ];
    }
}
