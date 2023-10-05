<?php

namespace Database\Factories;

use App\Models\ReservationFormula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slot>
 */
class SlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_formula_id' => ReservationFormula::all()->random()->id,
            'start_time' => $this->faker->time('H:i'),
            'duration' => $this->faker->numberBetween(10, 60),
            'status' => $this->faker->randomElement(['waiting', 'in_progress', 'finished']),
        ];
    }
}
