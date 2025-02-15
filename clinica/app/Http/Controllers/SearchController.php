<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use App\Models\Medico;

class SearchController extends Controller
{
    // Método que controla la búsqueda
    public function search(Request $request)
    {
        // Obtener la búsqueda desde el formulario
        $query = $request->input('query');
    
        // Realizar la búsqueda en Especialidades con paginación
        $especialidades = Especialidad::where('nombre', 'like', "%$query%")->paginate(10);
    
        // Realizar la búsqueda en Médicos con paginación (buscando en nombre y apellidos)
        $medicos = Medico::where('nombre', 'like', "%$query%")
                         ->orWhere('apellidos', 'like', "%$query%")
                         ->with('especialidad') // Cargar la relación para evitar problemas en la vista
                         ->paginate(500);
    
        // Retornar los resultados a la vista
        return view('search.results', compact('especialidades', 'medicos', 'query'));
    }
    
    
}
