@extends('layouts.app')

@section('title', $especialidad->nombre)

@section('content')
    <div class="container">
        <h1>Médicos en la Especialidad: {{ $especialidad->nombre }}</h1>

        @if ($especialidad->medicos->isEmpty())
            <p>No hay médicos asociados a esta especialidad.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Número de Colegiado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especialidad->medicos as $medico)
                        <tr>
                            <td>{{ $medico->nombre }}</td>
                            <td>{{ $medico->apellidos }}</td>
                            <td>{{ $medico->n_colegiado }}</td>
                            <td>
                                <!-- Botón para mostrar los detalles del médico -->
                                <button class="btn btn-info" onclick="toggleDetails({{ $medico->id }})">Más
                                    detalles</button>
                            </td>
                        </tr>
                        <!-- Detalles adicionales del médico, inicialmente ocultos -->
                        <tr id="details-{{ $medico->id }}" style="display: none;">
                            <td colspan="4">
                                <strong>Fecha de Ingreso:</strong> {{ $medico->created_at->format('d/m/Y') }} <br>
                                <strong>Teléfono:</strong> {{ $medico->telefono }} <br>
                                <strong>Correo:</strong> {{ $medico->email }} <br>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
