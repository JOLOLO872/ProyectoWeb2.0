<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Perfil; // Asegúrate de importar el modelo Perfil si no lo has hecho

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Obtener el perfil de administrador si existe
        $perfilAdmin = Perfil::where('nombre', 'Admin')->first();

        if ($perfilAdmin) {
            // Verificar si ya existe un usuario con el correo electrónico 'admin@example.com'
            if (!Usuario::where('email', 'admin@example.com')->exists()) {
                Usuario::create([
                    'nombre' => 'Admin',
                    'email' => 'admin@example.com',
                    'password' => bcrypt('password'),
                    'role' => 'admin',
                    'perfil_id' => $perfilAdmin->id,
                ]);
            } else {
                echo "El usuario con el correo 'admin@example.com' ya existe. No se creará un nuevo usuario.\n";
            }
        } else {
            echo "No se encontró el perfil 'Admin'. Debes crearlo manualmente o ejecutar el seeder PerfilSeeder primero.\n";
        }

        // Obtener el perfil de vendedor si existe
        $perfilVendedor = Perfil::where('nombre', 'Vendedor')->first();

        if ($perfilVendedor) {
            // Verificar si ya existe un usuario con el correo electrónico 'vendedor@example.com'
            if (!Usuario::where('email', 'vendedor@example.com')->exists()) {
                Usuario::create([
                    'nombre' => 'Vendedor',
                    'email' => 'vendedor@example.com',
                    'password' => bcrypt('password'),
                    'role' => 'vendedor',
                    'perfil_id' => $perfilVendedor->id,
                ]);
            } else {
                echo "El usuario con el correo 'vendedor@example.com' ya existe. No se creará un nuevo usuario.\n";
            }
        } else {
            echo "No se encontró el perfil 'Vendedor'. Debes crearlo manualmente o ejecutar el seeder PerfilSeeder primero.\n";
        }
    }
}
