<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class EventService
{
    public function getEventsForHomePage(): Collection
    {
        return $this->baseQuery()
            ->orderBy('date_start')
            ->take(6)
            ->get();
    }

    public function getEventsByGroups(): Collection
    {
        return $this->baseQuery()
            ->orderBy('date_start')
            ->get()
            ->groupBy('month_start')
            ->map(function ($group) {
                return (object) [
                    'date_start' => $group->first()->date_start,
                    'events'     => $group,
                ];
            })
            ->sortKeys();
    }

    public function getEventForShowPage(string | int $id): Event | Builder
    {
        return $this->baseQuery()
            ->where('id', '=', $id)
            ->firstOrFail();
    }

    protected function baseQuery(): Builder
    {
        return Event::query()
            ->actual()
            ->published();
    }
}
