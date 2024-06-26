<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios'; // Nombre de la tabla en plural

    protected $fillable = [
        'nombre', 'email', 'password', 'role_id',
    ];

    // Relación con el modelo Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Relación con clave foránea 'role_id'
    }

    // Método para verificar roles
    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }
}
