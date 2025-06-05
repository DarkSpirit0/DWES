<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Player::factory()->count(50)->create();
        // Uncomment the line below if you want to create players with specific teams
        // \App\Models\Player::factory()->count(50)->create(['team_id' => 1]);
    }
}
