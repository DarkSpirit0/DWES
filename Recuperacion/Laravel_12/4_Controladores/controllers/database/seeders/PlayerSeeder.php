<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        foreach (range(10, 20) as $index) {
            Player::create([
                'name' => $faker->name(),
                'age' => $faker->numberBetween(18, 40),
                'position' => $faker->randomElement(['Point Guard', 'Shooting Guard', 'Small Forward', 'Power Forward', 'Center']),
                'height' => $faker->numberBetween(150, 220),
                'weight' => $faker->numberBetween(50, 100),
                'team' => $faker->randomElement(['Lakers', 'Bulls', 'Celtics', 'Warriors', 'Nets', 'Heat', 'Mavericks', 'Clippers', 'Rockets', 'Suns']),
            ]);
        }
    }
}
