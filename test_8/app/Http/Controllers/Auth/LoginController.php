<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    // @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Aquí puedes definir otros métodos relacionados con la autenticación como login, logout, etc.
}
