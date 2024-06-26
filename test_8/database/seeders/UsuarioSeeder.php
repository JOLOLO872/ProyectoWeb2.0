<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Perfil;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $perfilAdmin = Perfil::firstOrCreate(['nombre' => 'Admin'], ['descripcion' => 'Perfil de administrador']);
        $perfilVendedor = Perfil::firstOrCreate(['nombre' => 'Vendedor'], ['descripcion' => 'Perfil de vendedor']);

        Usuario::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'nombre' => 'Admin',
            'password' => bcrypt('password'),
            'perfil_id' => $perfilAdmin->id,
        ])->assignRole('admin');

        Usuario::firstOrCreate([
            'email' => 'vendedor@example.com'
        ], [
            'nombre' => 'Vendedor',
            'password' => bcrypt('password'),
            'perfil_id' => $perfilVendedor->id,
        ])->assignRole('vendedor');
    }
}
