<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum EventViews
{
    case HEADER_VERTICAL;
    case HEADER_HORIZONTAL;
    case VIDEO;
    case TEXT_WITH_TAGS;
    case LIST;
    case LEFT_IMAGE_RIGHT_TEXT;
    case RIGHT_IMAGE_LEFT_TEXT;
    case SCHEDULE;
    case TEXT_ON_IMAGE;
    case TEXT_ON_IMAGE_2;
    case QUOTE;

    public static function options(?EventViews $key = null)
    {
        $items = [];
        foreach (self::cases() as $value) {
            $items[$value->name] = __('admin.events.views.' . $value->name);
        }

        if (isset($items[$key->name])) {
            return $items[$key->name];
        }

        return $items;
    }
}
