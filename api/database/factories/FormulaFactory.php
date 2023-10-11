<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formula>
 */
class FormulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => "2 sessions de kart",
            'image_url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'price' => 28,
            'number_of_sessions' => 2,
        ];
    }
}
