<?php

declare(strict_types=1);

namespace App\Filament\Traits;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Events\Dispatcher;

trait ClearEventsBeforeCreate
{
    public function beforeCreate()
    {
        app(Dispatcher::class)->forget(QueryExecuted::class);
    }
}
