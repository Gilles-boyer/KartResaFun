<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::all()->random()->id,
            'date' => $this->faker->date,
            'status' => $this->faker->randomElement(['unconfirmed', 'confirmed', 'arrived', 'postponed']),
            'comment' => $this->faker->sentence,
        ];
    }
}
