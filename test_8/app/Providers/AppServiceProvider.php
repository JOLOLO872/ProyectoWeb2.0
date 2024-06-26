<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        $this->registerPolicies();

        // Registrar todos los permisos necesarios
        Permission::create(['nombre' => 'admin']);
        Permission::create(['nombre' => 'vendedor']);

        // Asignar permisos a roles si es necesario
        Role::findByName('admin')->givePermissionTo('admin');
        Role::findByName('vendedor')->givePermissionTo('vendedor');
    }
}
