@extends('baseUsuario')
@section('titulo', 'Inicio')
@section('contenido')
@if(session('success'))
<div id="texto-exito" class="alert alert-success text-center" role="alert" style="border-radius: 10px; font-weight: bold; font-size: 1.1rem;">
  {{ session('success') }}
</div>
@endif
<section>
  <div id="carouselRoles" class="carousel slide" data-bs-ride="carousel">
    <!-- Imágenes del carrusel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="{{route('conocenos')}}">
        <img src="{{asset ('assets/media/img/mental-health.jpg') }}" class="d-block w-100" alt="Letras de salud mental">
        <div class="carousel-caption">
          <div class="titulo">Descubre Assolit</div>
          <div class="texto">
            Brindamos un entorno seguro y autónomo donde pueden
            desarrollar sus habilidades y participar en la comunidad.
          </div>
        </div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="{{route('voluntariado')}}">
        <img src="{{asset ('assets/media/img/voluntarios.jpg') }}" class="d-block w-100" alt="Ilustración de manos pintadas">
        <div class="carousel-caption">
          <div class="titulo">Hazte Voluntario</div>
          <div class="texto">
            Dedica un poco de tu tiempo y transforma la vida de quienes más lo necesitan. Únete y marca la diferencia.
          </div>
        </div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="{{route('comoTrabajamos')}}">
        <img src="{{asset ('assets/media/img/cerebro.jpg') }}" class="d-block w-100" alt="Ilustración de hilando un cerebro">
        <div class="carousel-caption">
          <div class="titulo">Cómo Trabajamos</div>
          <div class="texto">
            Acompañamos a cada persona en su día a día, fomentando su autonomía y ofreciéndole el apoyo que necesita para vivir con seguridad y bienestar.
          </div>
        </div>
        </a>
      </div>
    </div>

    <!-- Controles (flechas) -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoles" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselRoles" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</section>
<section class="text-center my-5">
  <a class="highlight-frase">
    "Mi valor está en lo que aporto, no en lo que me falta"
  </a>
</section>

<section class="viviendas-section">
  <div class="cards-container">
    
    <!-- Card 1 -->
    <div class="card">
      <a href="{{route('viviendasTuteladas')}}">
      <img src="{{asset('assets/media/img/olivo_1.png')}}" alt="Foto de Hogar Olivo">
      <div class="card-content">
        <h4>Hogar Olivo</h4>
        <p>Espacio acogedor con apoyo especializado y vida comunitaria.</p>
      </div>
</a>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <a href="{{route('viviendasTuteladas')}}">
      <img src="{{asset('assets/media/img/olivo_2.png')}}" alt="Foto de Hogar Encina">
      <div class="card-content">
        <h4>Hogar Encina</h4>
        <p>Ambiente seguro que fomenta la autonomía de cada persona.</p>
      </div>
      </a>
    </div>

    <!-- Card 3 -->
    <div class="card">
      <a href="{{route('viviendasTuteladas')}}">
      <img src="{{asset('assets/media/img/olivo_3.png')}}" alt="Foto de Hogar Sauce">
      <div class="card-content">
        <h4>Hogar Sauce</h4>
        <p>Programas diarios que permiten desarrollar habilidades.</p>
      </div>
      </a>
    </div>

    <!-- Card 4 -->
    <div class="card">
      <a href="{{route('viviendasTuteladas')}}">
      <img src="{{asset('assets/media/img/olivo_4.png')}}" alt="Foto de Hogar Cerezo">
      <div class="card-content">
        <h4>Hogar Cerezo</h4>
        <p>Entorno cálido y seguro con acompañamiento constante.</p>
      </div>
      </a>
    </div>

    <!-- Card 5 -->
    <div class="card">
      <a href="{{route('viviendasTuteladas')}}">
      <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Foto de Hogar Almendro">
      <div class="card-content">
        <h4>Hogar Almendro</h4>
        <p>Espacio inclusivo que fomenta la vida autónoma y social.</p>
      </div>
      </a>
    </div>
  </div>
</section>

<section class="area-cliente-section">

  <div class="area-cliente-row">

    <!-- Imagen -->
    <div class="area-cliente-img-wrapper">
      <img src="{{asset('assets/media/img/juntos.jpg')}}"
           class="img-fluid"
           alt="Gente en la playa dandose la mano">
    </div>

    <!-- Bloque azul -->
    <div class="area-cliente-content">
      <h3 class="mb-3">¡Únete a Assolit!</h3>
      <p class="mb-3">
        Buscamos que cada persona con discapacidad intelectual pueda disfrutar de una vida plena 
        y participar de forma activa y equitativa en la comunidad.
      </p>
      <a href="{{route('login')}}">
        <button class="btn btn-primary">Únete</button>
      </a>
    </div>

  </div>

</section>

<section class="vivienda-tutelada-section py-5">
  <div class="container">
    <!-- Título de la sección -->
    <h2 class="titulo-vivienda mb-3 text-center">Vivienda Tutelada</h2>
    <hr class="separador">

    <!-- Pestañas -->
    <ul class="nav nav-tabs justify-content-center mb-4 pestañas-vivienda" id="viviendaTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="que-es-tab" data-bs-toggle="tab" data-bs-target="#que-es" type="button" role="tab" aria-controls="que-es" aria-selected="true">
          Qué es
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="beneficios-tab" data-bs-toggle="tab" data-bs-target="#beneficios" type="button" role="tab" aria-controls="beneficios" aria-selected="false">
          Beneficios
        </button>
      </li>
    </ul>

    <!-- Contenido de las pestañas -->
    <div class="tab-content tab-content-fade">
      <!-- Pestaña Qué es -->
      <div class="tab-pane fade show active" id="que-es" role="tabpanel" aria-labelledby="que-es-tab">
        <div class="texto-vivienda p-4">
          <p class="descripcion-vivienda">
            Una <strong>vivienda tutelada</strong> es un espacio residencial especialmente diseñado para personas con necesidades de apoyo, 
            combinando <strong>autonomía personal</strong> con supervisión profesional. 
            Los residentes participan en actividades comunitarias, desarrollan habilidades sociales y funcionales, 
            y reciben apoyo constante para su bienestar físico, emocional y cognitivo. 
            El objetivo es ofrecer un entorno seguro, inclusivo y estimulante, donde cada persona pueda vivir con dignidad, crecer en independencia y sentirse parte de la comunidad.
          </p>
        </div>
      </div>

      <!-- Pestaña Beneficios -->
      <div class="tab-pane fade" id="beneficios" role="tabpanel" aria-labelledby="beneficios-tab">
        <div class="texto-vivienda p-4">
          <ul class="beneficios-list">
            <li><strong>Apoyo personalizado:</strong> asistencia profesional adaptada a cada necesidad.</li>
            <li><strong>Desarrollo de autonomía:</strong> fomento de habilidades para la vida diaria.</li>
            <li><strong>Convivencia y comunidad:</strong> interacción positiva con otros residentes.</li>
            <li><strong>Seguridad y bienestar:</strong> entorno protegido y estimulante.</li>
            <li><strong>Crecimiento personal:</strong> programas que fortalecen confianza y habilidades.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="info-section py-5">
  <div class="container">
    <div class="row g-4 justify-content-center">

      <div class="col-md-4">
        <div class="card info-card h-100 text-center">
          <div class="card-body">
            <div class="card-icon mb-3">
              <i class="bi bi-person-lines-fill"></i>
            </div>
            <h5 class="card-title">Apoyo profesional personalizado</h5>
            <p class="card-text">
              Contamos con un equipo de profesionales con experiencia, que acompañan a cada persona según sus necesidades, 
              garantizando atención respetuosa, profesional y cercana.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card info-card h-100 text-center">
          <div class="card-body">
            <div class="card-icon mb-3">
              <i class="bi bi-journal-text"></i>
            </div>
            <h5 class="card-title">Plan de vida individual</h5>
            <p class="card-text">
              Creamos un proyecto personal adaptado a cada residente: sus intereses, capacidades y metas, 
              apoyando su desarrollo social, emocional y funcional.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card info-card h-100 text-center">
          <div class="card-body">
            <div class="card-icon mb-3">
              <i class="bi bi-people-fill"></i>
            </div>
            <h5 class="card-title">Integración y vida comunitaria</h5>
            <p class="card-text">
              Fomentamos la participación en la comunidad, actividades compartidas y relaciones sociales, 
              promoviendo inclusión, respeto y autonomía dentro y fuera del hogar.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="colaboradores-section py-5">
  <div class="container-fluid">
    <h2 class="section-title text-center mb-5">Entidades que colaboran</h2>
    <div class="logos-row d-flex flex-wrap justify-content-between align-items-center">
      
      <div class="logo-item" data-bs-toggle="tooltip" title="Fundación Vida Plena">
        <img src="{{asset('assets/media/img/logo1.png')}}" alt="Logo Fundación Vida Plena">
        <p class="logo-name">Fundación Vida Plena</p>
      </div>

      <div class="logo-item" data-bs-toggle="tooltip" title="Asociación Manos Unidas">
        <img src="{{asset('assets/media/img/logo2.png')}}" alt="Logo Asociación Manos Unidas">
        <p class="logo-name">Asociación Manos Unidas</p>
      </div>

      <div class="logo-item" data-bs-toggle="tooltip" title="Red de Integración Social Nova">
        <img src="{{asset('assets/media/img/logo3.png')}}" alt="Logo Red de Integración Social Nova">
        <p class="logo-name">Red de Integración Social Nova</p>
      </div>

      <div class="logo-item" data-bs-toggle="tooltip" title="Centro de Apoyo Comunitario Horizonte">
        <img src="{{asset('assets/media/img/logo4.png')}}" alt="Logo Centro de Apoyo Comunitario Horizonte">
        <p class="logo-name">Centro de Apoyo Comunitario Horizonte</p>
      </div>

      <div class="logo-item" data-bs-toggle="tooltip" title="ONG Solidaridad y Futuro">
        <img src="{{asset('assets/media/img/logo5.png')}}" alt="Logo ONG Solidaridad y Futuro">
        <p class="logo-name">ONG Solidaridad y Futuro</p>
      </div>

      <div class="logo-item" data-bs-toggle="tooltip" title="Red Comunitaria Nova Esperanza">
        <img src="{{asset('assets/media/img/logo6.png')}}" alt="Logo Red Comunitaria Nova Esperanza">
        <p class="logo-name">Red Comunitaria Nova Esperanza</p>
      </div>

    </div>
  </div>
</section>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
@endsection