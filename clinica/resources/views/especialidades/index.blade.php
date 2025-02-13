@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Especialidades Disponibles</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($especialidades as $especialidad)
            <div class="p-4 border rounded-lg shadow">
                <h2 class="text-xl font-semibold">{{ $especialidad->nombre }}</h2>
                <p class="text-gray-600">{{ $especialidad->descripcion }}</p>
                
                <a href="{{ route('especialidades.medicos', $especialidad->id) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Médicos</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
