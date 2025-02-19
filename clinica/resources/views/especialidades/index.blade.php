@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')
    <div class="container mt-5">
        <section id="especialidades">
            <h2 class="text-primary">Especialidades</h2>
            <p>Contamos con un equipo de profesionales en distintas áreas médicas.</p>

            <div class="row">
                @foreach ($especialidades as $especialidad)
                    <div class="col-md-4 d-flex align-items-stretch mb-4">
                        <div class="card shadow-sm w-100">
                            <div class="card-body d-flex flex-column">
                                <img src="{{ url('especialidades/foto/' . $especialidad->id) }}" alt="Foto de la especialidad"
                                    class="img-fluid rounded mb-3" style="max-height: 200px; object-fit: cover;">
                                <h5 class="card-title">{{ $especialidad->nombre }}</h5>
                                <p class="card-text flex-grow-1">{{ $especialidad->descripcion }}</p>
                                <a href="{{ route('especialidades.medicos', $especialidad->id) }}"
                                    class="btn btn-primary mt-auto">Ver Médicos</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

@endsection
