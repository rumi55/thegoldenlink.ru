<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCity
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function scopeByCity(Builder $query, int $cityId): Builder
    {
        return $query->where('city_id', $cityId);
    }
}
