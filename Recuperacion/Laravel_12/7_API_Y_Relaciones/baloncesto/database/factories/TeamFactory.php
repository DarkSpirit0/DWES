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
            'name' => $this->faker->word(),
            'city' => $this->faker->city(),
            'mascot' => $this->faker->word(),
            'founded' => $this->faker->year(),
            'championships' => $this->faker->numberBetween(0, 10),
        ];
    }
}
