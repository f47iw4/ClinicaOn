<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- este header se puede cambiar, decir a Fati -->
    <header>
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
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 ClínicaOn. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
