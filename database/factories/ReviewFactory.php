<?php

namespace Database\Factories;

use App\Models\Gallery;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => [
                'ru' => $name = $this->faker->name(),
                'en' => $name,
            ],
            'text' => [
                'ru' => $text = $this->faker->realText(),
                'en' => $text,
            ],
            'link_to_youtube' => $this->faker->imageUrl(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Review $review) {
            copy(resource_path('images/content/review.jpg'), resource_path('images/content/reviewUpload.jpg'));

            $review
                ->addMedia(resource_path('images/content/reviewUpload.jpg'))
                ->toMediaCollection(Review::COLLECTION);
        });
    }
}
