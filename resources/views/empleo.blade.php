@extends('baseUsuario')
@section('titulo', 'Empleo')
@section('contenido')

<section class="empleo-section">
    <div class="container">

        <!-- Título principal -->
        <h2 class="empleo-title">Equipo Profesional y Empleo</h2>
        <hr class="empleo-separador">

        <!-- DESCRIPCIÓN GENERAL -->
        <p class="empleo-intro">
            En nuestras viviendas tuteladas contamos con un equipo multidisciplinar comprometido con el
            acompañamiento, la autonomía y el bienestar integral de cada residente. A continuación podrás
            conocer en profundidad los perfiles profesionales que forman parte del proyecto.
        </p>

        <!-- BLOQUE PROFESIONAL: Integrador Social -->
        <div class="empleo-bloque empleo-bloque-alternado">
            <div class="empleo-bloque-imagen">
                <img src="{{asset('assets/media/img/integrador.jpg')}}" alt="Integrador Social">
            </div>
            <div class="empleo-bloque-contenido">
                <h3 class="empleo-bloque-title">Integrador/a Social</h3>
                <p class="empleo-bloque-text">
                    El/la integrador/a social desarrolla la intervención más directa dentro de la vivienda.
                    Acompaña a los residentes en su día a día, guía en tareas cotidianas y fomenta hábitos
                    saludables y estables. Promueve la participación en actividades sociales, educativas y
                    comunitarias, detecta cambios emocionales y construye espacios de convivencia respetuosos
                    y seguros.<br><br>
                    Además, coordina con el equipo educativo y sanitario, organiza talleres y actividades
                    grupales, y fomenta la integración de cada residente en la comunidad, asegurando la
                    coherencia y calidad de la intervención.
                </p>
            </div>
        </div>

        <!-- BLOQUE PROFESIONAL: Trabajador Social -->
        <div class="empleo-bloque empleo-bloque-alternado reverse">
            <div class="empleo-bloque-imagen">
                <img src="{{asset('assets/media/img/trabajador.jpg')}}" alt="Trabajador Social">
            </div>
            <div class="empleo-bloque-contenido">
                <h3 class="empleo-bloque-title">Trabajador/a Social</h3>
                <p class="empleo-bloque-text">
                    El/la trabajador/a social supervisa y planifica programas de intervención personalizados.
                    Evalúa situaciones familiares y personales, realiza mediaciones y gestiona recursos externos,
                    asegurando un acompañamiento integral y ajustado a cada necesidad.<br><br>
                    Participa en la coordinación de actividades, seguimiento de evolución, y refuerza la
                    autonomía y bienestar emocional de cada residente, garantizando atención profesional y
                    segura.
                </p>
            </div>
        </div>

        <!-- BLOQUE PROFESIONAL: Psiquiatra -->
        <div class="empleo-bloque empleo-bloque-alternado">
            <div class="empleo-bloque-imagen">
                <img src="{{asset('assets/media/img/psiquiatra.jpg')}}" alt="Psiquiatra">
            </div>
            <div class="empleo-bloque-contenido">
                <h3 class="empleo-bloque-title">Psiquiatra</h3>
                <p class="empleo-bloque-text">
                    El/la psiquiatra aporta la visión clínica necesaria para garantizar el bienestar emocional
                    y psicológico de los residentes. Realiza evaluaciones, diagnósticos, ajustes de medicación
                    y seguimiento periódico.<br><br>
                    Asesora al equipo sobre pautas clínicas, interviene en situaciones de crisis, diseña
                    planes de tratamiento individualizados y contribuye al abordaje integral y coordinado de
                    cada caso, apoyando la estabilidad y salud mental de los residentes.
                </p>
            </div>
        </div>

        <!-- OFERTAS DE TRABAJO -->
        <section class="ofertas-empleo-subsection">
            <h2 class="oferta-title">Ofertas Activas</h2>
            <hr class="empleo-separador">

            <p class="empleo-intro">
                Si deseas formar parte de nuestro equipo profesional, consulta las vacantes disponibles:
            </p>

            <div class="ofertas-lista">
                @foreach($posts as $post)
                <div class="oferta-item">
                    <h4>{{ $post->titulo }}</h4>
                    <p>{{ $post->body }}</p>
                </div>
                @endforeach
            </div>
        </section>

        <!-- BLOQUE FINAL DE CONTACTO -->
        <section class="empleo-contacto">
            <h2 class="oferta-title">¿Te gustaría trabajar con nosotros?</h2>
            <hr class="empleo-separador">

            <p class="empleo-intro">
                Si estás interesado/a en unirte a nuestro equipo, envíanos tu carta de presentación y tu
                currículum al siguiente correo electrónico:
            </p>

            <p class="empleo-contacto-email">
                <strong>📧 pedro@assolit.es</strong>
            </p>
        </section>

    </div>
</section>

@endsection