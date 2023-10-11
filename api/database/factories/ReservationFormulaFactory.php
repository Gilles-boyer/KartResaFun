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
            'reservation_id' => 1,
            'formula_id' => 1,
            'number_of_people' => 5
        ];
    }
}
