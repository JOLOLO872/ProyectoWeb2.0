<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Perfil;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $perfiles = Perfil::all();
        return view('usuarios.create', compact('perfiles'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:8',
            'perfil_id' => 'required|exists:perfiles,id',
        ]);

        // Crear nuevo usuario
        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'perfil_id' => $request->perfil_id,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        $perfiles = Perfil::all();
        return view('usuarios.edit', compact('usuario', 'perfiles'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'perfil_id' => 'required|exists:perfiles,id',
        ]);

        // Actualizar usuario
        $usuario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'perfil_id' => $request->perfil_id,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(Usuario $usuario)
    {
        // No permitir eliminar al administrador
        if ($usuario->perfil_id == 1) {
            return redirect()->route('usuarios.index')->with('error', 'No se puede eliminar al administrador');
        }

        // Eliminar usuario
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
