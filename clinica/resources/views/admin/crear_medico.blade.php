@extends('layouts.app')

@section('title', 'Crear Médico')

@section('content')
    <div class="container">
        <h1>Añadir Nuevo Médico</h1>

        <form action="{{ route('admin.medicos') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="id_especialidad" class="form-label">Especialidad</label>
                <select class="form-control" id="id_especialidad" name="id_especialidad" required>
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>

            <div class="mb-3">
                <label for="n_colegiado" class="form-label">Número de Colegiado</label>
                <input type="text" class="form-control" id="n_colegiado" name="n_colegiado" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" required
                    onchange="previewImage(event)"><br>

                <!-- Aquí se mostrará la imagen seleccionada -->
                <img id="preview" src="" alt="Vista previa de la foto"
                    style="display: none; width: 100px; height: auto;" />
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('admin.medicos') }}" class="btn btn-secondary">Cancelar</a>
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
