<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Review;
use App\Services\EventService;
use App\Services\GalleryService;
use App\Services\ReviewService;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct(
        protected EventService $eventService,
        protected ReviewService $reviewService,
        protected GalleryService $galleryService,
    ) {
    }

    public function index(): View
    {
        return view('site.controllers.index.index', [
            'events'  => $this->eventService->getEventsForHomePage(),
            'gallery' => $this->galleryService->getGalleryForHomePage(),
            'reviews' => $this->reviewService->getReviewsForHomePage(),
        ]);
    }
}
