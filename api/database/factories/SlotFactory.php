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
            'reservation_formula_id' => 1,
            'start_time' => $this->faker->time('H:i'),
            'duration' => 15,
            'status' =>'waiting',
        ];
    }
}
