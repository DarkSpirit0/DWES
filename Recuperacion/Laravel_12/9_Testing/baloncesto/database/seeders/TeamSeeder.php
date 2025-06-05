<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Team::factory()->count(10)->create();
        // Uncomment the line below if you want to create teams with specific players
        // \App\Models\Team::factory()->count(10)->create(['player_id' => 1]);
    }
}
