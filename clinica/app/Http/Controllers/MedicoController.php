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
        'n_colegiado' => 'required|string|unique:medico,n_colegiado',
        'email' => 'required|email|unique:medico,email',
        'telefono' => 'required|string',
        'id_especialidad' => 'required|exists:especialidad,id',
        'foto' => 'nullable|image|max:2048'
    ]);

    $fotoBlob = null;
    if ($request->hasFile('foto')) {
        $fotoBlob = file_get_contents($request->file('foto')->getRealPath());
    }

    Medico::create([
        'n_colegiado' => $request->n_colegiado,
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'id_especialidad' => $request->id_especialidad,
        'email' => $request->email,
        'contrasenia' => Hash::make($request->contrasenia), // Encriptar contraseña
        'telefono' => $request->telefono,
        'foto' => $fotoBlob
    ]);

    return redirect()->route('admin.medicos')->with('success', 'Médico registrado exitosamente');
}


    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades= Especialidad::all();

        return view('admin.modificar_medico', compact('medico', 'especialidades'));
    }

    public function update(Request $request, $id)
{
    // Validamos los campos del formulario
    $request->validate([
        'n_colegiado' => 'required|string|max:100',
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'email' => 'required|email|unique:medico,email,' . $id, 
        'telefono' => 'nullable|string|max:20',
        'id_especialidad' => 'required|exists:especialidad,id',
        'foto' => 'nullable|image|max:2048' // Validamos que la foto sea una imagen y tenga un tamaño adecuado
    ]);
    
    // Buscamos el médico que estamos actualizando
    $medico = Medico::findOrFail($id);
    
    // Si el médico tiene una foto anterior, la mantenemos (si no se sube una nueva)
    $fotoBlob = $medico->foto; // Mantener la imagen actual si no se sube una nueva
    
    // Si el usuario ha subido una nueva foto, la convertimos a BLOB
    if ($request->hasFile('foto')) {
        // Leemos el contenido de la imagen subida y la convertimos a un BLOB
        $fotoBlob = file_get_contents($request->file('foto')->getRealPath());
    }
    
    // Actualizamos los datos del médico
    $medico->update([
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'id_especialidad' => $request->id_especialidad,
        'n_colegiado' => $request->n_colegiado,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'foto' => $fotoBlob // Almacenamos la foto en la base de datos como BLOB
    ]);
    
    return redirect()->route('admin.medicos')->with('success', 'Médico actualizado exitosamente');
}

    

    

public function destroy($id)
{
    $medico = Medico::findOrFail($id);
    $medico->delete(); // Eliminar médico directamente

    return redirect()->route('admin.medicos')->with('success', 'Médico eliminado exitosamente');
}

    public function mostrarFoto($id)
    {
        $medico = Medico::findOrFail($id);
    
        if (!$medico->foto) {
            abort(404); // Si no hay imagen, muestra error 404
        }
    
        return response($medico->foto)->header('Content-Type', 'image/jpeg'); 
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
