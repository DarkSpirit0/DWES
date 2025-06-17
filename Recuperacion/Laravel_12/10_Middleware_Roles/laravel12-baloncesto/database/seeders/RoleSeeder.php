<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrador del sistema',
        ]);

        // Otros roles opcionales
        Role::create([
            'name' => 'coach',
            'description' => 'Entrenador del equipo',
        ]);

        Role::create([
            'name' => 'user',
            'description' => 'Usuario estándar',
        ]);
    }
}

