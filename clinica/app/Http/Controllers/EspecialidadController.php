<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Especialidad::create($request->only('nombre', 'descripcion'));

        return redirect()->route('especialidades.index')->with('success', 'Especialidad registrada exitosamente');
    }

    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update($request->only('nombre', 'descripcion'));

        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada exitosamente');
    }

    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();

        return redirect()->route('especialidades.index')->with('success', 'Especialidad eliminada exitosamente');
    }
    /* Cosas nuevas vista detalle(IRENE) */
    public function show($id){
        $especialidad = Especialidad::with('medicos')->findOrFail($id);
        return view('especialidades.show', compact('especialidad'));
    }

    public function medicos($id){
        $especialidad = Especialidad::findOrFail($id);
        $medicos = $especialidad->medicos; 
        return view('medicos.index', compact('especialidad', 'medicos'));
    }
}
