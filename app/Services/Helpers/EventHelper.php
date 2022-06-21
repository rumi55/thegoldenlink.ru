<?php

declare(strict_types=1);

namespace App\Services\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class EventHelper
{
    public static function getDatesFromClasses(?Collection $classes): ?Collection
    {
        return $classes
            ?->map
            ?->dates
            ?->flatten(1)
            ?->map(function ($item) {
                if (!$item['start_at'] && !$item['end_at']) {
                    return null;
                }

                return [
                    'start_at' => $item['start_at'] ? Carbon::parse($item['start_at']) : null,
                    'end_at'   => $item['end_at'] ? Carbon::parse($item['end_at']) : null,
                ];
            })
            ?->filter()
            ?->sortBy('start_at');
    }
}
