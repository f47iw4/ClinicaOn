<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // Especificamos la tabla 'medico' si es necesario
    protected $table = 'medico';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'email', 'contrasenia', // Asegúrate de que 'contrasenia' esté aquí
    ];

    // Especificamos los campos ocultos para seguridad
    // Quitamos 'contrasenia' de los campos ocultos ya que ahora se guardará en texto plano
    protected $hidden = [
        'remember_token', // 'contrasenia' no debe ser ocultado si se maneja en texto plano
    ];

    // Usamos 'email' como el identificador de autenticación
    public function getAuthIdentifierName()
    {
        return 'email';
    }

    // Cambiar 'password' por 'contrasenia' para la autenticación
    public function getAuthPassword()
    {
        return $this->contrasenia; // Devolvemos la contraseña en texto plano
    }

    // Métodos para el token "remember me"
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
