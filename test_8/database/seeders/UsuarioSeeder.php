<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Perfil;
use App\Models\Role; // Asegúrate de importar el modelo Role aquí

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Obtener o crear perfiles
        $perfilAdmin = Perfil::firstOrCreate(['nombre' => 'Admin'], ['descripcion' => 'Perfil de administrador']);
        $perfilVendedor = Perfil::firstOrCreate(['nombre' => 'Vendedor'], ['descripcion' => 'Perfil de vendedor']);

        // Obtener o crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $vendedorRole = Role::firstOrCreate(['name' => 'vendedor']);

        // Crear usuarios y asignar roles según perfil
        Usuario::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'nombre' => 'Admin',
            'password' => bcrypt('password'),
            'perfil_id' => $perfilAdmin->id,
            'role_id' => $adminRole->id, // Asignar el rol directamente
        ]);

        Usuario::firstOrCreate([
            'email' => 'vendedor@example.com'
        ], [
            'nombre' => 'Vendedor',
            'password' => bcrypt('password'),
            'perfil_id' => $perfilVendedor->id,
            'role_id' => $vendedorRole->id, // Asignar el rol directamente
        ]);

        // Más usuarios según sea necesario

        // No es necesario llamar a 'assignRole()' ya que estamos asignando el rol directamente aquí
    }
}
