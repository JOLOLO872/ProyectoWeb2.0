<?php

// app/Http/Controllers/PermisoController.php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Perfil;
use App\Models\Menu;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::all();
        return view('permisos.index', compact('permisos'));
    }

    public function create()
    {
        $perfiles = Perfil::all();
        $menus = Menu::all();
        return view('permisos.create', compact('perfiles', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perfil_id' => 'required|exists:perfiles,id',
            'menu_id' => 'required|exists:menus,id',
        ]);

        Permiso::create([
            'perfil_id' => $request->perfil_id,
            'menu_id' => $request->menu_id,
        ]);

        return redirect()->route('permisos.index')->with('success', 'Permiso creado exitosamente.');
    }

    public function edit(Permiso $permiso)
    {
        $perfiles = Perfil::all();
        $menus = Menu::all();
        return view('permisos.edit', compact('permiso', 'perfiles', 'menus'));
    }

    public function update(Request $request, Permiso $permiso)
    {
        $request->validate([
            'perfil_id' => 'required|exists:perfiles,id',
            'menu_id' => 'required|exists:menus,id',
        ]);

        $permiso->update([
            'perfil_id' => $request->perfil_id,
            'menu_id' => $request->menu_id,
        ]);

        return redirect()->route('permisos.index')->with('success', 'Permiso actualizado exitosamente.');
    }

    public function destroy(Permiso $permiso)
    {
        $permiso->delete();
        return redirect()->route('permisos.index')->with('success', 'Permiso eliminado exitosamente.');
    }
}
