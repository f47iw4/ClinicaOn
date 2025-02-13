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
        // Obtener el término de búsqueda desde el formulario
        $query = $request->input('query');

        // Realizar la búsqueda en el modelo de Especialidades
        $especialidades = Especialidad::where('nombre', 'like', "%$query%")->get();

        // Realizar la búsqueda en el modelo de Médicos
        $medicos = Medico::where('nombre', 'like', "%$query%")->get();

        // Retornar los resultados a la vista de búsqueda
        return view('search.results', compact('especialidades', 'medicos', 'query'));
    }
}


