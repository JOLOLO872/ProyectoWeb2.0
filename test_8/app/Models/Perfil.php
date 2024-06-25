<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles'; // Asegúrate de que coincida con el nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    // Relación con usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'perfil_id');
    }

    // Otras relaciones u métodos del modelo
}
