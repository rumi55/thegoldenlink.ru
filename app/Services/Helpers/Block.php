<?php

declare(strict_types=1);

namespace App\Services\Helpers;

use App\Models\CustomBlock;
use Illuminate\Support\Facades\Cache;

class Block
{
    protected ?CustomBlock $customBlock = null;

    public function __construct(string $type)
    {
        $this->customBlock = Cache::remember($this->cacheKey($type), now()->addDay(), function () use ($type) {
            return CustomBlock::where('type', $type)->first();
        });
    }

    protected function cacheKey(string $type): string
    {
        return "blocks.{$type}." . (app()->environment('production')
                ? 'prod'
                : (string) time());
    }

    public static function get(string $type): static
    {
        return new static($type);
    }

    public function name(): ?string
    {
        return $this->customBlock->name;
    }

    public function text(): ?string
    {
        return $this->customBlock->text;
    }

    public function type(): ?string
    {
        return $this->customBlock->type;
    }

    public function image(): ?string
    {
        return $this->customBlock->image;
    }
}
