<?php

namespace Database\Factories;

use App\Models\Enums\Currency;
use App\Models\Event;
use App\Models\EventClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => [
                'ru' => $this->faker->word(),
                'en' => $this->faker->word(),
            ],
            'subtitle' => [
                'ru' => $this->faker->word(),
                'en' => $this->faker->word(),
            ],
            'is_published' => true,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            copy(resource_path('images/content/event.jpg'), resource_path('images/content/eventUpload.jpg'));

            $event
                ->addMedia(resource_path('images/content/eventUpload.jpg'))
                ->toMediaCollection('preview_image');

            $event->tags()->sync([1, 2]);
            $event->teachers()->sync([1, 2]);

            /** @var EventClass $class */
            $class = $event
                ->classes()->create([
                    'title' => [
                        'ru' => $this->faker->word(),
                        'en' => $this->faker->word(),
                    ],
                    'subtitle' => [
                        'ru' => $this->faker->word(),
                        'en' => $this->faker->word(),
                    ],
                    'dates' => [
                        [
                            'start_at' => now()->addDays($rand = rand(1, 30)),
                            'end_at' => now()->addDays($rand + 1),
                        ]
                    ],
                    'is_payable' => true,
                    'is_free' => false,
                ]);

            $class->prices()->create([
                'price' => 10000,
                'currency' => Currency::RUB,
            ]);
        });
    }
}
