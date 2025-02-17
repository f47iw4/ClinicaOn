@extends('layouts.app')

@section('title', 'Editar Médico')

@section('content')
    <div class="container">
        <h1>Editar Médico: {{ $medico->nombre }} {{ $medico->apellidos }}</h1>

        <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Usamos el método PUT para actualizar los datos -->
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $medico->nombre }}" required>
            </div>
            
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $medico->apellidos }}" required>
            </div>
            
            <div class="mb-3">
                <label for="id_especialidad" class="form-label">Especialidad</label>
                <select class="form-control" id="id_especialidad" name="id_especialidad" required>
                    @foreach($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}" 
                            {{ $especialidad->id == $medico->id_especialidad ? 'selected' : '' }}>
                            {{ $especialidad->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="n_colegiado" class="form-label">Número de Colegiado</label>
                <input type="text" class="form-control" id="n_colegiado" name="n_colegiado" value="{{ $medico->n_colegiado }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $medico->email }}" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $medico->telefono }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Médico</button>
            <a href="{{ route('admin.medicos') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
