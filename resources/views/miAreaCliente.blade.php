@extends('baseUsuario')
@section('titulo', 'Área Cliente')
@section('contenido')

<h2 class="text-center mb-4">Mis solicitudes enviadas</h2>

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

{{-- FORMULARIO NUEVA SOLICITUD --}}
<h3 class="text-center mb-4">Enviar nueva solicitud</h3>
<form action="{{ route('miSolicitudEnviar') }}" method="post" class="card p-5 shadow mx-auto" style="max-width:800px">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono (opcional)</label>
        <input type="text" id="telefono" name="telefono" class="form-control">
    </div>

    <div class="mb-3">
        <label for="mensaje" class="form-label">Consulta o información</label>
        <textarea id="mensaje" name="mensaje" rows="5" class="form-control" required></textarea>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="politicas" name="politicas" required>
        <label class="form-check-label" for="politicas">
            He leído y acepto las políticas de Assolit
        </label>
    </div>

    <button type="submit" class="btn btn-success w-100 btn-lg">Enviar solicitud</button>
</form>

@endsection