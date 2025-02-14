@extends('layouts.app')

@section('title', 'Crear Especialidad')

@section('content')
    <div class="container">
        <h1>Añadir Nueva Especialidad</h1>

        <form action="{{ route('especialidades.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Especialidad</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('admin.especialidades') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
