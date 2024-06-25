<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    public function run()
    {
        // Verificar si el perfil de administrador ya existe antes de crearlo
        $perfilAdmin = Perfil::where('nombre', 'Admin')->first();

        if (!$perfilAdmin) {
            Perfil::create([
                'nombre' => 'Admin',
                'descripcion' => 'Perfil de administrador',
            ]);
        }

        // Verificar si el perfil de vendedor ya existe antes de crearlo
        $perfilVendedor = Perfil::where('nombre', 'Vendedor')->first();

        if (!$perfilVendedor) {
            Perfil::create([
                'nombre' => 'Vendedor',
                'descripcion' => 'Perfil de vendedor',
            ]);
        }

        // Puedes crear más perfiles aquí si es necesario
    }
}
