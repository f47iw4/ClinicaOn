<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Medico;

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
           'contrasenia' => 'required|string'
       ]);

       if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Refrescar sesión
        return redirect()->intended('/admin'); // Redirigir a /admin si inicia sesión correctamente
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
