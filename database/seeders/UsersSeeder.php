<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

/**
 * Seeder de usuarios de ejemplo.
 *
 * Alimenta la base de datos con 5 usuarios usando el UserFactory,
 * útil para pruebas de la API y desarrollo local.
 */
class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(5)->create();
    }
}