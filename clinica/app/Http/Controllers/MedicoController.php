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
            'id_especialidad' => $request->id_especialidad, //hay que mostrar una lista de especialidades en la creación de médicos
            'email' => $request->email,
            'contrasenia' => $request->contrasenia, //no realizamos encriptación para que sea más facil ya que es una página de prueba
            'telefono' => $request->telefono,

        ]);

        return redirect()->route('admin.medicos')->with('success', 'Médico registrado exitosamente');
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

    //Método para listar los médicos en la vista del administrador(incluye botones de editar y eliminar)
    public function adminIndex(){
        $medicos = Medico::with('especialidad')->get();
        return view('admin.medicos', compact('medicos'));
    }
}

