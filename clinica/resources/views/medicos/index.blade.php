@extends('layouts.app')

@section('title', 'Lista de Médicos')

@section('content')
    <h1>Lista de Médicos</h1>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Perfil</th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
                <tr>
                    <td>{{ $medico->nombre }}</td>
                    <td>{{ $medico->apellidos }}</td>
                    <td>
                        @if($medico->foto)
                            <img src="data:image/jpeg;base64,{{ base64_encode($medico->foto) }}" width="50" height="50" class="rounded-circle">
                        @else
                            <span>Sin imagen</span>
                        @endif
                    </td>
                    <td><a href="{{ route('medicos.show', $medico->id) }}">Más detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@endsection
