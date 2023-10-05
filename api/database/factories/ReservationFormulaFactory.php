<?php

namespace Database\Factories;

use App\Models\Formula;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservationFormula>
 */
class ReservationFormulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_id' => Reservation::all()->random()->id,
            'formula_id' => Formula::all()->random()->id,
            'number_of_people' => $this->faker->numberBetween(1, 10),
        ];
    }
}
