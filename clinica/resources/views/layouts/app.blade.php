<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <!-- Agregar Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Favicon con la imagen proporcionada -->
    <link rel="icon" href="https://img.icons8.com/ultraviolet/40/heart-health.png" type="image/png">
    
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="sticky-top">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- Imagen del ícono de corazón antes del nombre -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <!-- Ícono del corazón -->
            <img src="https://img.icons8.com/ultraviolet/40/heart-health.png" alt="Heart Health Icon" style="width: 40px; height: 40px; margin-right: 10px;">
            Enfermitos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/especialidades') }}">Nuestras Especialidades</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/medicos') }}">Nuestros Médicos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">
                        <!-- Icono de usuario para "Iniciar Sesión" -->
                        <i class="bi bi-person-circle"></i> Iniciar Sesión
                    </a>
                    </li>

                    <!-- Formulario de búsqueda : IMPORTANTE-->
                    <li class="nav-item">
                        <form class="d-flex" action="{{ route('search') }}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar" name="query">
                            <button class="btn btn-outline-light" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>

    <main>
        @yield('content')
    </main>
    <footer class="bg-primary text-white py-1 sticky-bottom">
        <div class="container text-center">
            <p>© 2025 Enfermitos. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let lastScrollTop = window.scrollY;
        let footer = document.querySelector("footer");

        window.addEventListener("scroll", function () {
            let currentScroll = window.scrollY;
            let windowHeight = window.innerHeight;
            let documentHeight = document.documentElement.scrollHeight;

            if (currentScroll > lastScrollTop) {
                // Bajando
                if (currentScroll + windowHeight >= documentHeight) {
                    footer.style.transform = "translateY(100%)"; // Oculta el footer
                }
            } else {
                // Subiendo
                footer.style.transform = "translateY(0)"; // Muestra el footer
            }

            lastScrollTop = currentScroll;
        });
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
