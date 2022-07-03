<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public function getReviewsForHomePage()
    {
        return Review::query()
            ->latest()
            ->take(8)
            ->get();
    }
}
