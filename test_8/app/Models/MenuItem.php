<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MenuItem extends Model
{
    protected $fillable = [
        'menu_id', 'nombre', 'url', 'orden',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
