@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Resultados de la búsqueda para: "{{ $query }}"</h2>
        
        @if ($medicos->isEmpty() && $especialidades->isEmpty())
            <p>No se encontraron resultados.</p>
        @else
            <!-- Mostrar Médicos -->
            @if($medicos->isNotEmpty())
                <h3>Médicos encontrados:</h3>
                <ul class="list-group">
                    @foreach ($medicos as $medico)
                        <li class="list-group-item">
                        <h5>{{ $medico->nombre }} {{ $medico->apellidos }}</h5>
                        <p>Especialidad: {{ optional($medico->especialidades)->nombre ?? 'Sin especialidad' }}</p>
                        <!-- Aquí accedemos al nombre de la especialidad -->
                        </li>
                    @endforeach
                </ul>
            @endif
            
            <!-- Mostrar Especialidades -->
            @if($especialidades->isNotEmpty())
                <h3>Especialidades encontradas:</h3>
                <ul class="list-group">
                    @foreach ($especialidades as $especialidad)
                        <li class="list-group-item">
                            <h5>{{ $especialidad->nombre }}</h5>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    </div>
@endsection
