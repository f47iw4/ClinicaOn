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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $especialidad = new Especialidad();
        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;
    
        if ($request->hasFile('foto')) {
            $especialidad->foto = file_get_contents($request->file('foto')->getRealPath());
        }
    
        $especialidad->save(); // Guardamos manualmente
    
        return redirect()->route('admin.especialidades')->with('success', 'Especialidad registrada exitosamente');
    }
    

    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('admin.modificar_especialidad', compact('especialidad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $especialidad = Especialidad::findOrFail($id);

        if ($request->hasFile('foto')) {
            $fotoBlob = file_get_contents($request->file('foto')->getRealPath());
            $especialidad->foto = $fotoBlob;
        }

        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;
        $especialidad->save();

        return redirect()->route('admin.especialidades')->with('success', 'Especialidad actualizada exitosamente');
    }

    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();

        return redirect()->route('admin.especialidades')->with('success', 'Especialidad eliminada exitosamente');
    }

    public function show($id)
    {
        $especialidad = Especialidad::with('medicos')->findOrFail($id);
        return view('especialidades.show', compact('especialidad'));
    }

    public function medicos($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $medicos = $especialidad->medicos;
        return view('medicos.index', compact('especialidad', 'medicos'));
    }

    public function adminIndex()
    {
        $especialidades = Especialidad::all();
        return view('admin.especialidades', compact('especialidades'));
    }

    public function mostrarFoto($id)
    {
        $especialidad = Especialidad::findOrFail($id);

        if (!$especialidad->foto) {
            abort(404);
        }

        return response($especialidad->foto)->header('Content-Type', 'image/jpeg');
    }
}
