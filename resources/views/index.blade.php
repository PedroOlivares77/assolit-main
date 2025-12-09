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
    <!-- Indicadores (los puntitos de abajo) -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselRoles" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#carouselRoles" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#carouselRoles" data-bs-slide-to="2"></button>
    </div>

    <!-- Imágenes del carrusel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset ('assets/media/img/terapia.jpg') }}" class="d-block w-100" alt="Imagen 1">
        <div class="carousel-caption d-none d-md-block">
          <h5>Título 1</h5>
          <p>Descripción de la primera imagen.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset ('assets/media/img/voluntarios.jpg') }}" class="d-block w-100" alt="Imagen 2">
        <div class="carousel-caption d-none d-md-block">
          <h5>Título 2</h5>
          <p>Descripción de la segunda imagen.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset ('assets/media/img/terapia.jpg') }}" class="d-block w-100" alt="Imagen 3">
        <div class="carousel-caption d-none d-md-block">
          <h5>Título 3</h5>
          <p>Descripción de la tercera imagen.</p>
        </div>
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
<section class="mb-4 text-center">
  <div class="mb-3">
    <div class="row g-0 align-items-center fila-cuenta">
      <div class="col-8">
        <img src="{{asset ('assets/media/img/areaCliente.jpg') }}" class="img-fluid d-none d-md-flex" alt="Chico sonriendo con educadora social">
      </div>
      <div class="col-12 col-md-4 m-3 m-md-0">
        <div class="text-center">
          <h3 class="mb-4">Unete a Assolit</h3>
          <p class="m-3">Si estás en busca de información envía tu solicitud y consulta su estado</p>
          <a href="{{route('login')}}"><button class="btn btn-primary mb-2">Iniciar sesión</button></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="mb-4">
  <h2 class="m-3 h2">Últimas noticias</h2>
  <div class="row justify-content-around">
    <div class="col-sm-3 mb-3 mb-sm-0 card-noticia text-center">
      <div class="p-3">
        <h5>
          <a href="{{route('viviendas')}}#noticia1" class="link-success link-underline-opacity-0">
            Exposición de manuscritos medievales
          </a>
        </h5>
      </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0 card-noticia text-center">
      <div class="p-3">
        <h5>
          <a href="{{route('viviendas')}}#noticia2" class="link-success link-underline-opacity-0">
            Mesa redonda: Cine y novela. La visión de Valle-Inclán
          </a>
        </h5>
      </div>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0 card-noticia text-center">
      <div class="p-3">
        <h5>
          <a href="{{route('viviendas')}}#noticia3" class="link-success link-underline-opacity-0">
            5.º Congreso internacional sobre Cervantes
          </a>
        </h5>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row d-flex justify-content-around">
      <div class="col-md-3 mb-3 mt-3 mb-sm-0">
        <div class="card tarjeta tarjetaTalleres">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{route('conocenos')}}#talleres" class="link link-underline-opacity-0 enlace-card">
                Talleres
              </a>
            </h5>
            <p class="card-text">
              Descubre la variedad de talleres que ofrecemos
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3 mt-3 mb-sm-0">
        <div class="card tarjeta tarjetaSalas">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{route('comoTrabajamos')}}" class="link link-underline-opacity-0 enlace-card">
                Salas de estudio
              </a>
            </h5>
            <p class="card-text">
              Consulta la disponibilidad de nuestras salas de estudio
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-3 mt-3 mb-sm-0">
        <div class="card tarjeta tarjetaHemeroteca">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{route('empleoVoluntariado')}}" class="link link-underline-opacity-0 enlace-card">
                Hemeroteca
              </a>
            </h5>
            <p class="card-text">
              Accede a nuestra hemeroteca para consultar diarios y publicaciones periódicas
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('js')
        <script>
            
            $(document).ready(function(){
                $(".tarjetaTalleres").click(function(){
                    window.location.href = "{{route('conocenos')}}#talleres";
                });

                $(".tarjetaSalas").click(function(){
                    window.location.href = "{{route('comoTrabajamos')}}";
                });

                $(".tarjetaHemeroteca").click(function(){
                    window.location.href = "{{route('empleoVoluntariado')}}";
                });
            });

        </script>
    @endsection