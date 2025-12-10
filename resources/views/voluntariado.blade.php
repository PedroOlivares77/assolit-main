@extends('baseUsuario')
@section('titulo', 'Voluntariado')
@section('contenido')

<section class="voluntariado-section">

  <!-- Título -->
  <div class="text-center mb-4">
    <h2 class="voluntariado-title">Voluntariado</h2>
    <hr class="voluntariado-separador">
  </div>

  <!-- Imagen -->
  <div class="voluntariado-img-wrapper mb-4">
    <img src="{{ asset('assets/media/img/voluntariado.jpg') }}"
      alt="Personas realizando voluntariado"
      class="voluntariado-img">
  </div>

  <!-- Descripción -->
  <div class="voluntariado-texto">

    <p>
      En <b>Assolit</b> creemos en el poder de las personas y en cómo un pequeño gesto puede transformar el día de quienes más lo necesitan.
      Nuestro programa de voluntariado ofrece la oportunidad de acompañar, apoyar y compartir momentos significativos con personas con
      discapacidad intelectual que forman parte de nuestras viviendas tuteladas.
    </p>

    <p>
      El voluntariado en Assolit no requiere experiencia previa, tan solo ganas de aportar, aprender y convivir desde el respeto y la cercanía.
      Tu labor será clave para mejorar su bienestar emocional, su acceso a la comunidad y su calidad de vida.
    </p>

    <h4 class="voluntariado-sub">¿Qué puede hacer un voluntario en Assolit?</h4>

    <ul class="voluntariado-lista">
      <li>Acompañar a los usuarios a citas médicas o gestiones importantes.</li>
      <li>Realizar paseos, salidas y actividades al aire libre.</li>
      <li>Participar en juegos, talleres, actividades creativas o deportivas.</li>
      <li>Ayudar a reforzar rutinas de autonomía y hábitos saludables.</li>
      <li>Compartir tiempo, conversación y compañía.</li>
      <li>Apoyar en eventos o actividades comunitarias que se realicen desde Assolit.</li>
    </ul>

    <p>
      Cada minuto que compartes tiene un impacto real. El voluntariado no solo beneficia a los usuarios: también permite que tú crezcas,
      aprendas y formes parte de una comunidad que trabaja para construir una sociedad más inclusiva y humana.
    </p>

    <div class="text-center mt-4">
      @auth
      <!-- SI el usuario está logueado -->
      <a href="{{ route('miAreaCliente') }}">
        <button class="btn btn-primary btn-lg voluntariado-btn">Quiero ser voluntario</button>
      </a>
      @endauth

      @guest
      <!-- SI el usuario NO está logueado -->
      <a href="{{ route('formularioRegistro') }}">
        <button class="btn btn-primary btn-lg voluntariado-btn">Quiero ser voluntario</button>
      </a>
      @endguest
    </div>
  </div>

</section>
@endsection