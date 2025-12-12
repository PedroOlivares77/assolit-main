@extends('baseUsuario')
@section('titulo', 'Conocenos')
@section('contenido')

<section class="conocenos-section py-5">
  <div class="container">

    <!-- Título -->
    <div class="text-center mb-5">
      <h2 class="conocenos-title">Conócenos</h2>
      <hr class="conocenos-separador">
    </div>

    <!-- Bloque principal -->
    <div class="row conocenos-row-equal mb-5">
      <div class="col-md-6">
        <div class="conocenos-texto">
          <p>
            Hay proyectos que se sueñan. Otros que se planean.
            <strong>ASSOLIT nació de algo más profundo: de la necesidad humana de ofrecer un hogar digno, seguro y lleno de apoyo a quienes más lo necesitan.</strong>
          </p>

          <p>
            Nuestra historia empieza en un lugar sencillo: una casa, una familia y un hermano pequeño con un trastorno del desarrollo que, un día, expresó un deseo tan simple como inmenso:
            <em>“Ojalá algún día pueda tener mi casa.”</em>
          </p>

          <p>
            Ese deseo transformó todo. Nos hizo comprender que él —y tantas otras personas— merecían algo más que cuidados. Merecían
            <strong>oportunidades reales</strong>, autonomía acompañada, y un hogar donde sentirse capaces. Y así nació la idea que hoy
            se ha convertido en ASSOLIT.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <img src="{{asset('assets/media/img/sindrome_down.jpg')}}" class="conocenos-img" alt="Foto de una chica con un chico">
      </div>
    </div>

    <!-- Segundo bloque -->
    <div class="row conocenos-row-equal flex-md-row-reverse mb-5">
      <div class="col-md-6">
        <div class="conocenos-texto">
          <p>
            ASSOLIT es una red de <strong>viviendas tuteladas</strong> pensadas para acompañar, proteger y empoderar a personas con necesidades específicas. No trabajamos desde la asistencia, sino desde la humanidad. Creemos en las capacidades. Creemos en las pequeñas victorias. Creemos en la vida autónoma, con los apoyos necesarios.
          </p>

          <p>
            Cada una de nuestras viviendas es más que un espacio: es un proyecto de vida. Es un hogar donde se toman decisiones, se aprende, se convive y se crece. Donde cada persona encuentra su ritmo, su identidad y su libertad.
          </p>

          <p>
            <strong>Hoy, ASSOLIT es una comunidad.</strong> Una familia formada por profesionales, voluntarios, usuarios y familias que comparten el mismo propósito: construir un futuro más inclusivo, más humano y más lleno de posibilidades.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <img src="{{asset('assets/media/img/familia.jpg')}}" class="conocenos-img" alt="Familia en papel recortada">
      </div>
    </div>
  </div>
</section>
<section class="mv-section py-5">
  <div class="container text-center">

    <h2 class="mv-title mb-4">Misión, Visión y Valores</h2>
    <hr class="mv-separator">

    <div class="mv-center-container">

      <!-- MISIÓN -->
      <div class="mv-card mv-mision">
        <h3>Misión</h3>
        <p>
          Acompañar a las personas en su proyecto de vida ofreciéndoles un entorno de
          seguridad, cuidado y atención profesional que les permita lograr sus objetivos
          de integración social, independencia, calidad de vida, satisfacción y confort personal.
        </p>
      </div>

      <!-- VISIÓN -->
      <div class="mv-card mv-vision">
        <h3>Visión</h3>
        <p>
          Ser un referente de Servicios Sociosanitarios de Calidad Centrados en la Persona.
          Priorizar a la persona sobre los medios o los sistemas.
          Ser un lugar de relación personal y de crecimiento individual.
        </p>
      </div>
    </div>

    <!-- VALORES alrededor -->
    <div class="mv-values-grid">

      <div class="mv-value">Integridad, respeto a principios éticos y honestidad</div>

      <div class="mv-value">Dedicación personal y vocación de servicio</div>

      <div class="mv-value">Orientación a la persona</div>

      <div class="mv-value">Profesionalidad, formación continua e innovación</div>

      <div class="mv-value">Compromiso. Relaciones personales basadas en la confianza y el respeto</div>

      <div class="mv-value">Mejora continua: sistema integrado de calidad y medio ambiente</div>

    </div>

  </div>
</section>
<section class="finalidad-section py-5">
  <div class="container">

    <!-- Foto alargada -->
    <div class="finalidad-img-container mb-0">
      <img src="{{asset('assets/media/img/finalidad.jpg')}}" alt="Foto dos personas saltando" class="finalidad-img">
    </div>

    <!-- Recuadro como extensión -->
    <div class="finalidad-card">

      <!-- Finalidad -->
      <div class="finalidad-block mb-4">
        <h5 class="finalidad-subtitle">Objetivo Final</h5>
        <p>
          Mejorar la calidad de vida con la potenciación de recursos individuales, grupales y
          comunitarios, para generar nuevos entornos en los cuales las personas adquieran mayor
          capacidad para controlar ellas mismas su propia vida; partiendo de la base del sujeto como
          actor y responsable de su conducta, participante activo y creador de ambientes en busca de
          su bienestar y de su auto-determinación e independencia.
        </p>
      </div>

      <!-- Gracias por querer conocernos -->
      <div class="finalidad-block">
        <h5 class="finalidad-subtitle">Gracias por querer conocernos</h5>
        <p>
          Si estás aquí es porque crees, como nosotros, que cada persona merece un lugar donde ser ella misma.
          Gracias por confiar, por apoyar y por formar parte de esta historia que recién empieza.
        </p>
        <p>
          Cada gesto, cada palabra y cada acción cuenta. Gracias a personas como tú, podemos construir un espacio seguro,
          lleno de oportunidades, respeto y cuidado, donde cada individuo puede crecer, aprender y sentirse valorado.
        </p>
        <p>
          Tu apoyo no solo ayuda a quienes reciben nuestros servicios, sino que también fortalece a toda nuestra comunidad.
          Juntos seguimos avanzando hacia un mundo más inclusivo, humano y lleno de posibilidades para todos.
        </p>
      </div>

    </div>

  </div>
</section>

<section class="opiniones-section py-5">
    <div class="container text-center">
        <h2 class="opiniones-title mb-4">Opiniones</h2>
        <hr class="opiniones-separator">

        <div class="postit-container">
            @foreach($opiniones->take(6) as $opinion)
            <div class="postit">
                <div class="postit-content">
                    <p class="postit-autor"><strong>{{ $opinion->autor }}</strong></p>
                    <p class="postit-text">{{ $opinion->comentario }}</p>
                    <p class="postit-rating">Valoración: {{ $opinion->valoracion }}/5</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection