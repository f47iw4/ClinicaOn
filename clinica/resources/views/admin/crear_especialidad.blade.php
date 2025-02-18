@extends('layouts.app')

@section('title', 'Crear Especialidad')

@section('content')
    <div class="container">
        <h1>Añadir Nueva Especialidad</h1>

        <form action="{{ route('especialidades.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Especialidad</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" required onchange="previewImage(event)"><br>

                <!-- Aquí se mostrará la imagen seleccionada -->
                <img id="preview" src="" alt="Vista previa de la foto" style="display: none; width: 100px; height: auto;"/>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('admin.especialidades') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script>
        // Función para previsualizar la imagen seleccionada
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Mostrar la imagen previsualizada
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
