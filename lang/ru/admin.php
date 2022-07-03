<?php

return [
    'events' => [
        'views' => [
            \App\Models\Enums\EventViews::HEADER_VERTICAL->name       => 'Шапка вертикально',
            \App\Models\Enums\EventViews::HEADER_HORIZONTAL->name     => 'Шапка горизонтально',
            \App\Models\Enums\EventViews::VIDEO->name                 => 'Видео',
            \App\Models\Enums\EventViews::TEXT_WITH_TAGS->name        => 'Текстовый блок, с тегами',
            \App\Models\Enums\EventViews::LIST->name                  => 'Список',
            \App\Models\Enums\EventViews::LEFT_IMAGE_RIGHT_TEXT->name => 'Слева картинка, справа текст',
            \App\Models\Enums\EventViews::RIGHT_IMAGE_LEFT_TEXT->name => 'Справа картинка, слева текст',
            \App\Models\Enums\EventViews::SCHEDULE->name              => 'Расписание',
            \App\Models\Enums\EventViews::TEXT_ON_IMAGE->name         => 'Текст на картинке',
            \App\Models\Enums\EventViews::TEXT_ON_IMAGE_2->name       => 'Текст на картинке 2',
            \App\Models\Enums\EventViews::QUOTE->name                 => 'Цитата',
        ],
    ],
];
