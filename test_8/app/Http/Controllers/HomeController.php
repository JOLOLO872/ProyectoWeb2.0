<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'vendedor') {
            return redirect()->route('vendedor.dashboard');
        }

        return view('home');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function vendedorDashboard()
    {
        return view('vendedor.dashboard');
    }
}