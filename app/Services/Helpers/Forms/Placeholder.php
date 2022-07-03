<?php

declare(strict_types=1);

namespace App\Services\Helpers\Forms;

use App\Services\Utils\Tag;

class Placeholder
{
    public static function howItWillLook(string $image): \Filament\Forms\Components\Placeholder
    {
        return \Filament\Forms\Components\Placeholder::make(
            'look'
        )
            ->label(__('How will look. It is example'))
            ->content(
                Tag::img(
                    $image,
                    ['class' => 'w-full']
                ),
            );
    }
}
