<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Password is auto-hashed by the User model cast.
        User::create(['name' => 'Luis Fernández', 'email' => 'admin@example.com', 'password' => 'password', 'role' => 'admin']);
        User::create(['name' => 'Carlos Ruiz', 'email' => 'tecnico1@example.com', 'password' => 'password', 'role' => 'tecnico']);
        User::create(['name' => 'Ana Martínez', 'email' => 'tecnico2@example.com', 'password' => 'password', 'role' => 'tecnico']);
        User::create(['name' => 'María González', 'email' => 'usuario1@example.com', 'password' => 'password', 'role' => 'usuario']);
        User::create(['name' => 'Pedro López', 'email' => 'usuario2@example.com', 'password' => 'password', 'role' => 'usuario']);
        User::create(['name' => 'Juan Pérez', 'email' => 'usuario3@example.com', 'password' => 'password', 'role' => 'usuario']);
    }
}
