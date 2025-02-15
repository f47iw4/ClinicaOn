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
        // Validar las credenciales (sin usar 'password' porque no es encriptada)
        $request->validate([
            'email' => 'required|email',
            'contrasenia' => 'required'
        ]);

        // Buscar usuario por email
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && $user->contrasenia === $request->contrasenia) {
            // Iniciar sesión manualmente
            Auth::login($user);

            // Redirigir al dashboard
            return redirect()->route('admin.index');

        }

        // Si las credenciales son incorrectas, mostrar un mensaje de error
        return back()->with('error', 'Credenciales incorrectas');
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout(); // Cerrar sesión del usuario
        return redirect('/login'); // Redirigir al formulario de inicio de sesión
    }
}
