@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
    <div class="container">
        <h1>Panel de Administración</h1>

        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('admin.medicos') }}" class="btn btn-primary mx-2">Sección Médicos</a>
            <a href="{{ route('admin.especialidades') }}" class="btn btn-success mx-2">Sección Especialidades</a>
        </div>
    </div>
@endsection
