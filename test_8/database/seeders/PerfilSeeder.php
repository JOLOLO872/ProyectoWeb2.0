<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;
use Spatie\Permission\Models\Role;

class PerfilSeeder extends Seeder
{
    public function run()
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $vendedorRole = Role::firstOrCreate(['name' => 'vendedor']);

        // Crear perfiles
        $adminPerfil = Perfil::firstOrCreate([
            'nombre' => 'Admin',
            'descripcion' => 'Perfil de administrador',
        ]);
        
        $vendedorPerfil = Perfil::firstOrCreate([
            'nombre' => 'Vendedor',
            'descripcion' => 'Perfil de vendedor',
        ]);

        // Asociar roles a los perfiles
        $adminPerfil->roles()->attach($adminRole);
        $vendedorPerfil->roles()->attach($vendedorRole);
    }
}
