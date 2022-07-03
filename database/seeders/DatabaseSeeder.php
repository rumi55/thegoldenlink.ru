<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Organizer;
use App\Models\Review;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Gallery::factory()->count(4)->create();

        Organizer::factory()->count(10)->create();

        Review::factory()->count(8)->create();

        Venue::factory()->count(5)->create();

        Event::factory()->count(5)->create();
    }
}
