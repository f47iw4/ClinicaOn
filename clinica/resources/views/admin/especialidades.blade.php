@extends('layouts.app')

@section('title', 'Administrar Especialidades')

@section('content')
    <div class="container">
        <h1>Administrar Especialidades</h1>

        <!-- Botón para añadir una nueva especialidad -->
        <a href="{{ route('admin.especialidades.create') }}" class="btn btn-success mb-3">Añadir Especialidad</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($especialidades as $especialidad)
                    <tr>
                        <td>{{ $especialidad->nombre }}</td>
                        <td>{{ $especialidad->descripcion }}</td>
                        <td>
                            <a href="{{ route('especialidades.edit', $especialidad->id) }}"
                                class="btn btn-warning">Modificar</a>
                            <form action="{{ route('especialidades.destroy', $especialidad->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Seguro que quieres eliminar esta especialidad?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
