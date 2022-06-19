<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
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
            'address' => [
                'ru' => $address = $this->faker->address(),
                'en' => $address,
            ],
            'coordinates' => [
                'lat' => $this->faker->latitude(),
                'lng' => $this->faker->longitude(),
            ],
            'description' => [
                'ru' => $text = $this->faker->text(),
                'en' => $text,
            ],
            'city_id' => City::query()->inRandomOrder()->first()->id,
        ];
    }
}
