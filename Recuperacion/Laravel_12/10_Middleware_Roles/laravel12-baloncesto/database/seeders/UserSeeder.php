<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   public function run()
{
    $adminRole = Role::where('name', 'admin')->first();

    if (!$adminRole) {
        throw new \Exception('El rol "admin" no se encontró. Asegúrate de ejecutar RoleSeeder primero.');
    }

    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'role_id' => $adminRole->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    User::create([
        'name' => 'Coach',
        'email' => 'coach@example.com',
        'password' => Hash::make('password'),
        'role_id' => $adminRole->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    
    User::create([
        'name' => 'User',
        'email' => 'user@example.com',
        'password' => Hash::make('password'),
        'role_id' => $adminRole->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
}
