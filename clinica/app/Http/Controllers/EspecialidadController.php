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
        return view('admin.crear_especialidad');
    }

    public function store(Request $request)
    {
        //Validad los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            //ambos campos obligatorios
        ]);
        //guarda en la base de datos:
        Especialidad::create($request->only('nombre', 'descripcion'));

        return redirect()->route('admin.especialidades')->with('success', 'Especialidad registrada exitosamente');
        //Hacemos que redirija a la vista de administración de especialidades no???
    }

    public function edit($id){
        $especialidad = Especialidad::findOrFail($id);
        return view('admin.modificar_especialidad', compact('especialidad'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update($request->only('nombre', 'descripcion'));

        return redirect()->route('admin.especialidades')->with('success', 'Especialidad actualizada exitosamente');
    }

    public function destroy($id){
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();

        return redirect()->route('admin.especialidades')->with('success', 'Especialidad eliminada exitosamente');
    }

    /* Métodos de la vista detalle*/
    public function show($id){
        $especialidad = Especialidad::with('medicos')->findOrFail($id);
        return view('especialidades.show', compact('especialidad'));
    }

    public function medicos($id){
        $especialidad = Especialidad::findOrFail($id);
        $medicos = $especialidad->medicos; 
        return view('medicos.index', compact('especialidad', 'medicos'));
    }

    //Método para la vista de administración de especialidades
    public function adminIndex(){
        $especialidades = Especialidad::all();
        return view('admin.especialidades', compact('especialidades'));
    }
}
