<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function itemsMenu()
    {
        return $this->hasMany(ItemMenu::class, 'menu_id');
    }

    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'menu_id');
    }

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'permisos', 'menu_id', 'perfil_id');
    }
}
