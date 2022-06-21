<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Review;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()->latest()->take(6)->get();
        $gallery = Gallery::find(1);
        $reviews = Review::query()->latest()->take(8)->get();

        return view(
            'site.controllers.index.index',
            compact('events', 'gallery', 'reviews')
        );
    }
}
