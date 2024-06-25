<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'perfil_id',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación inversa con el modelo Perfil
    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
}
