@extends('layouts.app')

@section('title', 'Detalles del Médico')

@section('content')
    <div class="container-fluid">
        <h1>{{ $medico->nombre }} {{ $medico->apellidos }}</h1>
        <div class="mb-3">
            <img src="{{ $medico->foto_url }}" alt="Foto de {{ $medico->nombre }}" class="img-thumbnail" width="200">
        </div>
        <p><strong>Número de Colegiado:</strong> {{ $medico->n_colegiado }}</p>
        <p><strong>Email:</strong> {{ $medico->email }}</p>
        <p><strong>Teléfono:</strong> {{ $medico->telefono }}</p>
        <p><strong>Desde:</strong> {{ $medico->created_at }}</p>
    </div>
@endsection
