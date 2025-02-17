<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Vista de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'contrasenia' => 'required'
    ]);

    // Buscar usuario por email
    $user = User::where('email', $request->email)->first();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && $user->contrasenia === $request->contrasenia) {
        Auth::login($user); // Autenticar usuario manualmente
        $request->session()->regenerate(); // Regenerar sesión
        return redirect()->intended('/admin'); // Redirigir a /admin
    }

    return back()->withErrors(['email' => 'Credenciales incorrectas']);
}


    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }
}
