<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('admin.crear_medico', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'n_colegiado' => 'required|string|unique:medico',
            'email' => 'required|email|unique:medico',
            'telefono' => 'required|string',
            'id_especialidad' => 'required|exists:especialidad,id'
        ]);

        $medico = Medico::create([
            'n_colegiado' => $request->n_colegiado,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'id_especialidad' => $request->id_especialidad, // Especialidad seleccionada
            'email' => $request->email,
            'contrasenia' => $request->contrasenia, // Aquí no estamos haciendo encriptación para la contraseñsa por ser una prueba
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('admin.medicos')->with('success', 'Médico registrado exitosamente');
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('admin.medicos', compact('medico', 'especialidades'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos recibidos
        $request->validate([
            'n_colegiado' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:medicos,email,' . $id,  // Excluimos el correo electrónico actual
            'contrasenia' => 'nullable|string|min:8', // Contraseña es opcional, pero si se pasa, debe ser válida
            'telefono' => 'nullable|string|max:20',
            'id_especialidad' => 'required|exists:especialidades,id', // Especialidad seleccionada
        ]);

        // Buscar al médico por ID
        $medico = Medico::findOrFail($id);

        // Actualizar los datos del médico
        $medico->update([
            'n_colegiado' => $request->n_colegiado,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'contrasenia' => $request->contrasenia ? Hash::make($request->contrasenia) : $medico->contrasenia, // Encriptamos la contraseña si se pasa
            'telefono' => $request->telefono,
            'id_especialidad' => $request->id_especialidad, // Actualizamos la especialidad seleccionada
        ]);

        // Si el formulario incluye especialidades múltiples, las sincronizamos
        // Si no necesitas sincronización de especialidades, omite esta parte
        // Ejemplo de cómo sincronizar especialidades si la relación es de muchos a muchos
        if ($request->has('especialidades')) {
            $medico->especialidades()->sync($request->especialidades);
        }

        return redirect()->route('admin.medicos')->with('success', 'Médico actualizado exitosamente');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->especialidades()->detach(); // Eliminar relación con especialidades
        $medico->delete(); // Eliminar médico

        return redirect()->route('admin.medicos')->with('success', 'Médico eliminado exitosamente');
    }

    // Método para mostrar detalles de un médico
    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.show', compact('medico'));
    }

    // Método para listar médicos en la vista del administrador (con botones de editar y eliminar)
    public function adminIndex()
    {
        $medicos = Medico::with('especialidades')->get(); // Obtener médicos con especialidades
        return view('admin.medicos', compact('medicos'));
    }
}
