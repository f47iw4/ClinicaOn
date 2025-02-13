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
        return view('medicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'n_colegiado' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:medicos,email',
            'contrasenia' => 'required|string|min:8',
            'telefono' => 'nullable|string|max:20',
            'especialidades' => 'required|array',
        ]);

        $medico = Medico::create([
            'n_colegiado' => $request->n_colegiado,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'contrasenia' => Hash::make($request->contrasenia),
            'telefono' => $request->telefono,
        ]);

        // Asociamos las especialidades seleccionadas
        $medico->especialidades()->attach($request->especialidades);

        return redirect()->route('medicos.index')->with('success', 'Médico registrado exitosamente');
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'n_colegiado' => 'required|string|max:100',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:medicos,email,' . $id,
            'contrasenia' => 'nullable|string|min:8',
            'telefono' => 'nullable|string|max:20',
            'especialidades' => 'required|array',
        ]);

        $medico = Medico::findOrFail($id);
        $medico->update([
            'n_colegiado' => $request->n_colegiado,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'contrasenia' => $request->contrasenia ? Hash::make($request->contrasenia) : $medico->contrasenia,
            'telefono' => $request->telefono,
        ]);

        // Actualizamos las especialidades
        $medico->especialidades()->sync($request->especialidades);

        return redirect()->route('medicos.index')->with('success', 'Médico actualizado exitosamente');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->especialidades()->detach();
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado exitosamente');
    }
    /* para mostrar los detalles de los médicos*/
    public function show($id){
    $medico = Medico::findOrFail($id);
    return view('medicos.show', compact('medico')); 
    }

}

