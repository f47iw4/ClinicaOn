
@extends('layouts.app')

@section('title', 'Clínica Médica')
<!--Aquí metes el carrusel y el resto de cosas  -->
@section('content')
 <!-- Carrusel de Imágenes -->
 <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Imagen 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('/storage/images/car1.png') }}" class="d-block w-100" alt="Imagen 1">
            </div>
            <!-- Imagen 2 -->
            <div class="carousel-item">
                <img src="{{ asset('storage/images/car2.png') }}" class="d-block w-100" alt="Imagen 2">
                
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
@endsection

   