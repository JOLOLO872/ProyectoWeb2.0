<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Maneja la autenticación de usuarios
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Verificar el rol del usuario y redirigir según el rol
            $usuario = Auth::user();
            if ($usuario->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($usuario->hasRole('vendedor')) {
                return redirect()->route('vendedor.dashboard');
            } else {
                // Por defecto, redirigir al dashboard principal
                return redirect()->route('home');
            }
        }

        // Si la autenticación falla, redirigir de vuelta con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Maneja el logout del usuario
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
