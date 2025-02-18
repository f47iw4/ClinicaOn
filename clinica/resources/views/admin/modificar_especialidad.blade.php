@extends('layouts.app')

@section('title', 'Editar Especialidad')

@section('content')
    <div class="container">
        <h1>Editar Especialidad: {{ $especialidad->nombre }}</h1>

        <form action="{{ route('especialidades.update', $especialidad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Método para actualizar -->
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Especialidad</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $especialidad->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $especialidad->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" required><br>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Especialidad</button>
            <a href="{{ route('admin.especialidades') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
