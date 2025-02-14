@extends('layouts.app')

@section('title', 'Lista de Médicos')

@section('content')
    <h1>Lista de Médicos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->nombre }}</td>
                <td>{{ $medico->apellidos }}</td>
                <td><a href="{{ route('medicos.show', $medico->id) }}">Más detalles</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
