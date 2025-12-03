<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/media/img/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.6/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset ('assets/css/estilos.css') }}"/>
    <title>@yield('titulo')</title>
    <script src="{{ asset('/vendor/bootstrap-5.3.6/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/9f4bf3af88.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/vendor/jQuery/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" /> 
</head>
<body>
        <header id="headerUsuario">

        <!-- NavBar -->
        <div class="container">
            <div class="row d-flex justify-content-space-around">
                <nav class="navbar navbar-expand-lg usuario">
                    <div class="d-flex justify-content-start">
                        <a href="{{route('index')}}" class="navbar-brand"><img id="logo" src="{{asset('assets/media/img/assolitLogo.png')}}" alt="Logo"></a>
                        <div class="navbar-brand mb-0 align-self-center">Assolit</div>
                    </div>
                    <div class="d-flex justify-content-md-end m-3">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#burger">
                            <i class="fa-solid fa-light fa-bars"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="burger">
                        <ul class="navbar-nav p-0 m-0 justify-content-center justify-content-lg-end container align-items-center">
                            @if(auth()->user())
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('index')}}">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('viviendasTuteladas')}}">Viviendas Tuteladas</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('comoTrabajamos')}}">Como trabajamos</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('empleoVoluntariado')}}">Empleo/Voluntariado</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('conocenos')}}">Conócenos</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{route('login')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hola, {{auth()->user()->nombre}}</a>
                                      <ul class="dropdown-menu">
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
                                <li class="nav-item">
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('index')}}">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('viviendasTuteladas')}}">Viviendas Tuteladas</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('comoTrabajamos')}}">Como trabajamos</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('empleoVoluntariado')}}">Empleo/Voluntariado</a></li>
                                <li class="nav-item"><a class="nav-link enlace-nav" href="{{route('conocenos')}}">Conócenos</a></li>
                                <a class="nav-link" href="{{route('login')}}"><i class="fa-solid fa-light fa-user"></i></a></li>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>

    <main>
        <div class="contenido-admin">
            <div class="aside-admin">
                @if(auth()->user())
                    @if(auth()->user()->hasRole('admin'))
                        <ul>
                            <li><a class="dropdown-item" href="{{route('users')}}">Users</a></li>
                            <li><a class="dropdown-item" href="{{route('roles')}}">Roles</a></li>
                            <li><a class="dropdown-item" href="{{route('viviendas')}}">Viviendas</a></li>
                            <li><a class="dropdown-item" href="{{route('usuarios')}}">Usuarios</a></li>
                            <li><a class="dropdown-item" href="{{route('medicamentos')}}">Medicamentos</a></li>
                            <li><a class="dropdown-item" href="{{route('opiniones')}}">Opiniones</a></li>
                            <li><a class="dropdown-item" href="{{route('posts')}}">Posts Empleo</a></li>
                            <li><a class="dropdown-item" href="{{route('solicitudes')}}">Solicitudes</a></li>
                        </ul>
                    @else
                        <li><a href="{{route('index')}}">Inicio</a></li>  
                    @endif
                
                @endif
            </div>
            
            <div class="info">
                @yield('info')
            </div>
        </div>
    </main>
    <footer class="container-fluid justify-content-center p-0">
        <div class="row m-0">
            <div class="col-12 col-md-3">
                <a href="{{route('index')}}" class="navbar-brand"><img id="logo-footer" src="{{asset('assets/media/img/assolitLogo.png')}}" alt="Logo" ></a>
                <h3 class="navbar-brand mb-0 text-center">Assolit</h3>
            </div>

            <div class="col-12 col-md-3 mt-3">
                <p><a href="" class="link-underline link-underline-opacity-0 enlace-footer">
                    Contacto
                </a></p>
                <p><a href="" class="link-underline link-underline-opacity-0 enlace-footer">
                    Horario de apertura
                </a></p>
            </div>

            <div class="col-12 col-md-3 mt-3">
                <p><a href="#" class="link-underline link-underline-opacity-0 enlace-footer">
                    Suscríbete a nuestro boletín de noticias
                </a></p>
                <p><a href="#" class="p-0 link-underline link-underline-opacity-0 enlace-footer">
                    Redes sociales:
                </a></p>
                <div class="row justify-content-center p-0">
                    <div class="col-3">
                        <a href="#" class="link-underline link-underline-opacity-0 enlace-footer">
                            <i class="fa-brands fa-x-twitter fa-2x icono-redes"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="" class="link-underline link-underline-opacity-0 enlace-footer">
                            <i class="fa-brands fa-instagram fa-2x icono-redes"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="" class="link-underline link-underline-opacity-0 enlace-footer">
                            <i class="fa-brands fa-facebook fa-2x icono-redes"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 mt-3">
                <p><a href="#" class="link-underline link-underline-opacity-0 enlace-footer">
                    Política de privacidad
                </a></p>
                <p><a href="#" class="link-underline link-underline-opacity-0 enlace-footer">
                    Aviso legal
                </a></p>
                <p><a href="#" class="link-underline link-underline-opacity-0 enlace-footer">
                    Declaración de accesibilidad
                </a></p>
            </div>
        </div>
    </footer>
    @yield('js')    
</body>
</html>