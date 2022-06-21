<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
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
                'ru' => $name = $this->faker->word(),
                'en' => $name,
            ],
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Gallery $gallery) {
            collect(array_fill(0, 10, 'some'))
                ->each(function () use ($gallery) {
                    copy(resource_path('images/content/gallery.jpg'), resource_path('images/content/galleryUpload.jpg'));

                    $gallery
                        ->addMedia(resource_path('images/content/galleryUpload.jpg'))
                        ->toMediaCollection(Gallery::COLLECTION);
                });
        });
    }
}
