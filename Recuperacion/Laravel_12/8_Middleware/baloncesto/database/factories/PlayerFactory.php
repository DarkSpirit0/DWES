<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'edad' => $this->faker->numberBetween(18, 40),
            'position' => $this->faker->randomElement(['Base', 'Escolta', 'Alero', 'Ala-pivot', 'Pivot']),
            'height' => $this->faker->numberBetween(150, 220),
            'weight' => $this->faker->numberBetween(50, 120),
            'team_id' => \App\Models\Team::factory(),
        ];
    }
}
