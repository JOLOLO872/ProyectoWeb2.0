<?php

// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Menu::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menú creado exitosamente.');
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $menu->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menú actualizado exitosamente.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menú eliminado exitosamente.');
    }
}
