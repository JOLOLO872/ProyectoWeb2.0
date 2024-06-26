<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RolesTableSeeder::class, // Llama al seeder correcto
            UsuarioSeeder::class,
            
        ]);
    }
}
