<?php

use Spatie\Permission\Models\Role;

// Crear un nuevo rol 'admin' si no existe
$roleAdmin = Role::where('name', 'admin')->first();
if (!$roleAdmin) {
    Role::create(['name' => 'admin', 'guard_name' => 'web']);
}

// Crear un nuevo rol 'vendedor' si no existe
$roleVendedor = Role::where('name', 'vendedor')->first();
if (!$roleVendedor) {
    Role::create(['name' => 'vendedor', 'guard_name' => 'web']);
}
    
