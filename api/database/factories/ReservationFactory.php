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
            'client_id' => 1,
            'date' => date("Y-m-d"),
            'number_of_adults' => 5,
            'number_of_children' => 0,
            'number_of_biplace' => 0,
            'status' => 'confirmed',
            'comment' => $this->faker->sentence,
        ];
    }
}
