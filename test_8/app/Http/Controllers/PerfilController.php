<?php
namespace App\Http\Controllers;


use App\Models\Perfil;
use App\Models\Menu;  // Asegúrate de importar el modelo Menu
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfiles = Perfil::all();
        return view('perfiles.index', compact('perfiles'));
    }

    public function create()
{
    $menus = Menu::all();
    return view('perfiles.create', compact('menus'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:perfiles,nombre',
            'descripcion' => 'nullable|string',
            'menus' => 'array',
            'menus.*' => 'exists:menus,id',
        ]);

        $perfil = Perfil::create($request->only('nombre', 'descripcion'));

        if ($request->has('menus')) {
            $perfil->menus()->attach($request->menus);
        }

        return redirect()->route('perfiles.index')->with('success', 'Perfil creado correctamente');
    }

    public function show(Perfil $perfil)
    {
        return view('perfiles.show', compact('perfil'));
    }

    public function edit(Perfil $perfil)
    {
        $menus = Menu::all();
        return view('perfiles.edit', compact('perfil', 'menus'));
    }

    public function update(Request $request, Perfil $perfil)
    {
        $request->validate([
            'nombre' => 'required|unique:perfiles,nombre,' . $perfil->id,
            'descripcion' => 'nullable|string',
        ]);

        $perfil->update($request->only('nombre', 'descripcion'));

        return redirect()->route('perfiles.index')->with('success', 'Perfil actualizado correctamente');
    }

    public function destroy(Perfil $perfil)
    {
        $perfil->delete();
        return redirect()->route('perfiles.index')->with('success', 'Perfil eliminado correctamente');
    }
    
}

