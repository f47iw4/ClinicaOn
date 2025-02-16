@extends('layouts.app')

@section('title', 'Crear Médico')

@section('content')
<style>
/* Esto es para arreglar la barra del select, NO QUITAR!! */

select {
        max-height: 38px; /* Mantiene el tamaño cerrado */
        overflow-y: auto;
    }

    /* Hace que el select muestre solo 4 opciones antes de hacer scroll */
    select option {
        height: 30px;
    }

    select[size] {
        height: auto; 
    }

    select:focus {
        min-height: auto;
    }
</style>

    <div class="container">
        <h1>Añadir Nuevo Médico</h1>

        <form action="{{ route('medicos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_especialidad" class="form-label">Especialidad</label>
                <select class="form-control" id="id_especialidad" name="id_especialidad" required >
                    @foreach($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>

            <div class="mb-3">
                <label for="n_colegiado" class="form-label">Número de Colegiado</label>
                <input type="text" class="form-control" id="n_colegiado" name="n_colegiado" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>


            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('admin.medicos') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
