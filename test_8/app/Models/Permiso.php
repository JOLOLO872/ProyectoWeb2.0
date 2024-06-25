<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = [
        'perfil_id', 
        'menu_id',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
