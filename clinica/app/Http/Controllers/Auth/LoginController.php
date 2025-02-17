<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Importar el modelo User

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'contrasenia' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && $user->contrasenia === $request->contrasenia) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }
    
        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }
    
    

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
    
}