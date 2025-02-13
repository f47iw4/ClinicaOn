@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')
<div class="container mt-5">
    <!-- Sección Especialidades -->
    <section id="especialidades">
        <h2 class="text-primary">Especialidades</h2>
        <p>Contamos con un equipo de profesionales en distintas áreas médicas.</p>

        <div class="row">
            @foreach ($especialidades as $especialidad)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $especialidad->nombre }}</h5>
                            <p class="card-text">{{ $especialidad->descripcion }}</p>
                            <a href="{{ route('especialidades.medicos', $especialidad->id) }}" class="btn btn-primary mt-2">Ver Médicos</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
