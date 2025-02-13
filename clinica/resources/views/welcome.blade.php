<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Enfermitos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#especialidades">Nuestras Especialidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#medicos">Nuestros Médicos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mt-5">
        <!-- Sección Especialidades -->
        <section id="especialidades">
            <h2 class="text-primary"> Especialidades</h2>
            <p>Contamos con un equipo de profesionales en distintas áreas médicas.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Cardiología</h5>
                            <p class="card-text">Cuidado y tratamiento del corazón y el sistema circulatorio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pediatría</h5>
                            <p class="card-text">Atención especializada para los más pequeños.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Neurología</h5>
                            <p class="card-text">Diagnóstico y tratamiento de enfermedades del sistema nervioso.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Médicos -->
        <section id="medicos" class="mt-5">
            <h2 class="text-primary"> Médicos</h2>
            <p>Conoce a nuestro equipo de especialistas altamente capacitados.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Juan Pérez</h5>
                            <p class="card-text">Especialista en Cardiología con más de 15 años de experiencia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dra. María Gómez</h5>
                            <p class="card-text">Pediatra comprometida con la salud infantil.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Luis Fernández</h5>
                            <p class="card-text">Neurólogo experto en enfermedades del sistema nervioso.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
