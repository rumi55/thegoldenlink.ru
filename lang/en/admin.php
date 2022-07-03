<?php

return [
    'events' => [
        'views' => [
            \App\Models\Enums\EventViews::HEADER_VERTICAL->name       => 'Header vertical',
            \App\Models\Enums\EventViews::HEADER_HORIZONTAL->name     => 'Header horizontal',
            \App\Models\Enums\EventViews::VIDEO->name                 => 'Video',
            \App\Models\Enums\EventViews::TEXT_WITH_TAGS->name        => 'Text with tags',
            \App\Models\Enums\EventViews::LIST->name                  => 'List',
            \App\Models\Enums\EventViews::LEFT_IMAGE_RIGHT_TEXT->name => 'Left image, right text',
            \App\Models\Enums\EventViews::RIGHT_IMAGE_LEFT_TEXT->name => 'Right image, left text',
            \App\Models\Enums\EventViews::SCHEDULE->name              => 'Schedule',
            \App\Models\Enums\EventViews::TEXT_ON_IMAGE->name         => 'Text on image',
            \App\Models\Enums\EventViews::TEXT_ON_IMAGE_2->name       => 'Text on image 2',
            \App\Models\Enums\EventViews::QUOTE->name                 => 'Quote',
        ],
    ],
];
