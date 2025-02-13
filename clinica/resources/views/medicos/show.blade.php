@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $medico->nombre }} {{ $medico->apellidos }}</h1>
        <p><strong>Número de Colegiado:</strong> {{ $medico->n_colegiado }}</p>
        <p><strong>Email:</strong> {{ $medico->email }}</p>
        <p><strong>Teléfono:</strong> {{ $medico->telefono }}</p>
        <p><strong>Desde:</strong> {{ $medico->created_at }}</p>
    </div>
@endsection
