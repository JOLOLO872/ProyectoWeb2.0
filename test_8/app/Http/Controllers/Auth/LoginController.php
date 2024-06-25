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
            \Log::info('Usuario autenticado: ', ['user' => Auth::user()]);

            // Verificar si el usuario es un administrador
            if (Auth::user()->hasRole('admin')) {
                \Log::info('Redirigiendo a admin.dashboard');
                return redirect()->route('admin.dashboard');
            }

            // Redirigir al dashboard o a la página principal por defecto
            if (Auth::user()->hasRole('vendedor')) {
                \Log::info('Redirigiendo a vendedor.dashboard');
                return redirect()->route('vendedor.dashboard');
            }

            \Log::info('Redirigiendo a home');
            return redirect()->intended('home');
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
