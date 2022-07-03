<?php

declare(strict_types=1);

namespace App\Services\Utils;

use Illuminate\Support\HtmlString;

class Tag
{
    public static function make(string $tag, ?string $content = '', array $attributes = []): HtmlString
    {
        $attributesAsString = collect($attributes)
            ->map(fn ($value, $key) => sprintf('%s="%s"', $key, $value))
            ->implode(' ');

        if (in_array($tag, ['br', 'img', 'hr'])) {
            return new HtmlString(
                "<{$tag} {$attributesAsString}>",
            );
        }

        return new HtmlString(
            "<{$tag} {$attributesAsString}>{$content}</{$tag}>",
        );
    }

    public static function img(string $src, array $attributes = []): HtmlString
    {
        return static::make('img', '', array_merge($attributes, [
            'src' => $src,
        ]));
    }
}
