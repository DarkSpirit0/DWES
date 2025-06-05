<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
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
            'city' => $this->faker->city(),
            'mascot' => $this->faker->name(),
            'founded' => $this->faker->year(),
            'championships' => $this->faker->numberBetween(0, 20),
            'coach' => $this->faker->name(),
            'stadium' => $this->faker->name(),
        ];
    }
}
