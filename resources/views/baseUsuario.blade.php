<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ secure_asset('assets/media/img/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="{{ secure_asset('assets/css/estilos.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <title>@yield('titulo')</title>
</head>

<body>
    <header id="headerUsuario">

        <!-- NavBar -->
<nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid ps-0">
            <a class="navbar-brand d-flex align-items-center ps-5" href="{{route('index')}}">
                <img id="logo" src="{{asset('assets/media/img/assolitLogo.png')}}" alt="Logo" height="60" class="me-3">
                <span class="allura-regular">Assolit</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#burger">
                <i class="fa-solid fa-bars" style="color:#007C91;"></i>
            </button>
            <div class="collapse navbar-collapse" id="burger">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item mx-4"><a class="nav-link" href="{{route('index')}}">Inicio</a></li>
                    <li class="nav-item mx-4"><a class="nav-link" href="{{route('viviendasTuteladas')}}">Viviendas Tuteladas</a></li>
                    <li class="nav-item mx-4"><a class="nav-link" href="{{route('comoTrabajamos')}}">Cómo trabajamos</a></li>
                    <li class="nav-item mx-4"><a class="nav-link" href="{{route('voluntariado')}}">Voluntariado</a></li>
                    <li class="nav-item mx-4"><a class="nav-link" href="{{route('empleo')}}">Empleo</a></li>
                    <li class="nav-item mx-4"><a class="nav-link" href="{{route('conocenos')}}">Conócenos</a></li>

                    @if(auth()->user())
                        <li class="nav-item dropdown mx-4 me-5">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Hola, {{auth()->user()->nombre}}
                            </a>
                            <ul class="dropdown-menu shadow-sm">
                                @if(auth()->user()->hasRole('psiquiatra'))
                                    <li><a class="dropdown-item" href="{{ route('miAreaPsiquiatra') }}">Área Empleado</a></li>
                                @elseif(auth()->user()->hasRole('trabajador_social'))
                                    <li><a class="dropdown-item" href="{{ route('miAreaTrabajadorSocial') }}">Área Empleado</a></li>
                                @elseif(auth()->user()->hasRole('admin'))
                                    <li><a class="dropdown-item" href="{{ route('indexAdmin') }}">Administración</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('miAreaCliente') }}">Mi Área</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item mx-4 me-5"><a class="nav-link" href="{{route('login')}}"><i class="fa-solid fa-user"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
    <main id="mainUsuario">
        @yield('contenido')
    </main>
<footer id="footerUsuario" class="bg-cian-claro text-dark mt-auto py-4">
    <div class="container-fluid">
        <div class="row text-dark">
            <!-- Logo y nombre a la izquierda -->
            <div class="col-md-3 mb-4 mb-md-0 d-flex flex-column justify-content-start ps-md-4 text-center text-md-start">
                <a href="{{ route('index') }}" class="d-flex flex-column align-items-center align-items-md-start text-decoration-none">
                    <img src="{{ asset('assets/media/img/assolitLogo.png') }}" alt="Logo" height="70" class="mb-2">
                    <p class="allura-regular">Assolit</p>
                </a>
            </div>

            <!-- Contacto -->
            
            <div class="col-md-3 mb-4 mb-md-0 ps-md-4 text-center text-md-start">
                <p><a href="{{route('empleo')}}">Empleo</a></p>
                <p><a href="{{route('voluntariado')}}">Voluntariado</a></p>
                <p><a href="{{route('viviendasTuteladas')}}">Viviendas</a></p>
                <p><a href="{{ route('comoTrabajamos')}}#ingreso-tarifas">Tarifas</a></p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0 ps-md-4 text-center text-md-start">
                <p><a href="#">Política de privacidad</a></p>
                <p><a href="#">Aviso legal</a></p>
                <p><a href="#">Declaración de accesibilidad</a></p>
            </div>
            
            <div class="col-md-3 mb-4 mb-md-0 ps-md-4 text-center text-md-start">
                <p>📞 +34 654 312 987</a></p>
                <p>✉️ info@assolit.com</a></p>
                <p class="mb-4">Redes sociales:</p>
                <div class="d-flex justify-content-center justify-content-md-start gap-4 footer-social">
                    <a href="#"><i class="fa-brands fa-twitter fa-2x"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram fa-2x"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <!-- Redes y boletín -->

            <!-- Legal -->
        </div>
        <div class="text-center mt-4">&copy; {{ date('Y') }} Assolit. Todos los derechos reservados.</div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('js')
</body>

</html>
