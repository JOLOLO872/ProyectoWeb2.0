<?php

// app/Http/Controllers/ItemMenuController.php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class ItemMenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::all();
        return view('menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('menu_items.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'nombre' => 'required',
            'url' => 'required',
            'orden' => 'required|integer',
        ]);

        MenuItem::create([
            'menu_id' => $request->menu_id,
            'nombre' => $request->nombre,
            'url' => $request->url,
            'orden' => $request->orden,
        ]);

        return redirect()->route('menu-items.index')->with('success', 'Elemento de menú creado exitosamente.');
    }

    public function edit(MenuItem $menuItem)
    {
        $menus = Menu::all();
        return view('menu_items.edit', compact('menuItem', 'menus'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'nombre' => 'required',
            'url' => 'required',
            'orden' => 'required|integer',
        ]);

        $menuItem->update([
            'menu_id' => $request->menu_id,
            'nombre' => $request->nombre,
            'url' => $request->url,
            'orden' => $request->orden,
        ]);

        return redirect()->route('menu-items.index')->with('success', 'Elemento de menú actualizado exitosamente.');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Elemento de menú eliminado exitosamente.');
    }
}
