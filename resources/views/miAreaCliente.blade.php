@extends('baseUsuario')
@section('titulo', 'Área Cliente')
@section('contenido')
<div class="info-ingreso-panel mb-5">
    <div class="info-ingreso-text">
        <h4>¿Quieres saber más sobre el ingreso en la vivienda y las tarifas?</h4>
        <p>Consulta toda la información detallada sobre requisitos, proceso de admisión y precios.</p>
    </div>

<a href="{{ route('comoTrabajamos')}}#ingreso-tarifas" class="btn btn-primary btn-lg info-ingreso-btn">
    Ver información
</a>
</div>
@if($solicitudes->isNotEmpty())
    <h2 class="text-center mb-4 mt-4">Mis solicitudes enviadas</h2>

    @if(session('ok'))
        <div class="alert alert-success text-center">{{ session('ok') }}</div>
    @endif

    {{-- LISTADO DE SOLICITUDES --}}
    <div class="d-flex flex-column gap-4">
        @foreach($solicitudes as $solicitud)
            <div class="card p-4 shadow w-100" style="max-width:800px; margin:auto;">
                <h5 class="mb-2">{{ $solicitud->nombre }}</h5>
                <p class="mb-1">{{ $solicitud->mensaje }}</p>
                <p class="mb-1"><b>Estado:</b> 
                    @if($solicitud->estado == 'Nuevo')
                        <span class="badge bg-warning text-dark">{{ $solicitud->estado }}</span>
                    @else
                        <span class="badge bg-success text-white">{{ $solicitud->estado }}</span>
                    @endif
                </p>
                <small class="text-muted">Enviada: {{ $solicitud->created_at }}</small>
            </div>
        @endforeach
    </div>

    <hr class="my-5">
@endif

{{-- FORMULARIO NUEVA SOLICITUD --}}
<h3 class="text-center mb-4">Enviar nueva solicitud</h3>
<form id="solicitudForm" action="{{ route('miSolicitudEnviar') }}" method="post" class="card p-5 shadow mx-auto mb-5" style="max-width:800px">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" class="form-control" >
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="text" id="email" name="email" class="form-control" >
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono (opcional)</label>
        <input type="text" id="telefono" name="telefono" class="form-control">
    </div>

    <div class="mb-3">
        <label for="mensaje" class="form-label">Consulta o información</label>
        <textarea id="mensaje" name="mensaje" rows="5" class="form-control" ></textarea>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="politicas" name="politicas" >
        <label class="form-check-label" for="politicas">
            He leído y acepto las políticas de Assolit
        </label>
    </div>
    <div id="texto-error" class="text-danger text-center mb-3"></div>
    <button type="submit" class="btn btn-success w-100 btn-lg">Enviar solicitud</button>
</form>
<script>
    document.getElementById('solicitudForm').addEventListener('submit', function(e){
    e.preventDefault(); // detener envío hasta validar

    let nombre = document.getElementById('nombre').value.trim();
    let email = document.getElementById('email').value.trim();
    let mensaje = document.getElementById('mensaje').value.trim();
    let politicas = document.getElementById('politicas').checked;
    let error = '';

    // Limpiar estilos anteriores
    document.getElementById('nombre').style.borderColor = '';
    document.getElementById('email').style.borderColor = '';
    document.getElementById('mensaje').style.borderColor = '';
    document.getElementById('politicas').style.outline = '';

    // Validaciones
    if(!nombre){
        error = 'El nombre completo es obligatorio.';
        document.getElementById('nombre').style.borderColor = '#e70909';
    } else if(!email){
        error = 'El correo electrónico es obligatorio.';
        document.getElementById('email').style.borderColor = '#e70909';
    } else if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
        error = 'Introduce un correo electrónico válido.';
        document.getElementById('email').style.borderColor = '#e70909';
    } else if(!mensaje){
        error = 'La consulta o información es obligatoria.';
        document.getElementById('mensaje').style.borderColor = '#e70909';
    } else if(mensaje.length > 500){
        error = 'La consulta no puede superar 500 caracteres.';
        document.getElementById('mensaje').style.borderColor = '#e70909';
    } else if(!politicas){
        error = 'Debes aceptar las políticas de Assolit.';
        document.getElementById('politicas').style.outline = '2px solid #e70909';
    }

    if(error){
        document.getElementById('texto-error').innerText = error;
        return false;
    } else {
        document.getElementById('texto-error').innerText = '';
        this.submit(); // enviar formulario si todo es correcto
    }
});

</script>

@endsection