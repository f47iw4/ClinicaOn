<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use App\Models\Medico;

class SearchController extends Controller
{
    // Método que maneja la búsqueda
    public function search(Request $request)
    {
        // Obtener la búsqueda desde el formulario
        $query = $request->input('query');

        // Realizar la búsqueda en el modelo de Especialidades con paginación (paginate en lugar de get)
        $especialidades = Especialidad::where('nombre', 'like', "%$query%")->paginate(10);

        // Realizar la búsqueda en el modelo de Médicos con paginación
        $medicos = Medico::where('nombre', 'like', "%$query%")->paginate(10);

        // Retornar los resultados a la vista de búsqueda
        return view('search.results', compact('especialidades', 'medicos', 'query'));
    }
    
}
