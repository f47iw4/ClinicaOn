@extends('layouts.app')

@section('title', 'Administrar Médicos')

@section('content')
<div class="container">
    <h1>Administrar Médicos</h1>

    <!-- Botón para añadir un nuevo médico -->
    <a href="{{ route('medicos.create') }}" class="btn btn-success mb-3">Añadir Médico</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Especialidad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->nombre }}</td>
                <td>{{ $medico->apellidos }}</td>
                <td>{{ $medico->especialidad->nombre }}</td>
                <td>
                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning">Modificar</a>
                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este médico?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
