@extends('baseAdmin')
@section('titulo', 'Formulario Vivienda')
@section('info')

<h3 class="titulo text-center">{{ $vivienda ? 'Editar Vivienda' : 'Crear Vivienda' }}</h3>

<div class="row justify-content-center">
  <div class="col-md-6 bg-white p-4 rounded shadow m-4 mb-5">

    @if (empty($vivienda))
        <form action="{{ route('crearVivienda') }}" method="post">
    @else
        <form action="{{ route('editarVivienda', $vivienda->id) }}" method="post">
    @endif

        @csrf

        <div class="mb-4">
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $vivienda->nombre ?? '' }}">
        </div>

        <div class="mb-4">
            <label class="form-label" for="capacidad">Capacidad</label>
            <input class="form-control" type="number" name="capacidad" id="capacidad" value="{{ $vivienda->capacidad ?? '' }}">
        </div>

        <div class="mb-4">
            <label class="form-label" for="lugar">Lugar</label>
            <input class="form-control" type="text" name="lugar" id="lugar" value="{{ $vivienda->lugar ?? '' }}">
        </div>

        <!-- USERS SECTION -->
        <h6 class="mt-3 mb-2">Asignar Users (Psiquiatra  | Trabajador Social )</h6>
        <div class="d-flex flex-wrap gap-3">
            @foreach ($usersDisponibles as $u)
                <label class="p-2 border rounded shadow-sm small">
                    <input type="checkbox" name="users[]" value="{{ $u->id }}"
                        {{ $usersAsignados->contains($u->id) ? 'checked' : '' }}>
                    <strong>{{ $u->nombre }}</strong>
                    <br>
                    <span class="text-muted text-xs">{{ $u->rol->tipo }}</span>
                </label>
            @endforeach
        </div>

        <!-- USUARIOS SECTION -->
                    <h6 class="mt-4 mb-2">Asignar Usuarios</h6>
                <div class="d-flex flex-column gap-2">
                @foreach ($usuariosDisponibles as $p)
                    <label class="small p-2 border rounded">
                    <input type="checkbox" name="usuarios[]" value="{{ $p->id }}"
                    {{ $usuariosAsignados->contains($p->id) ? 'checked' : '' }}>
                    {{ $p->nombre }} {{ $p->apellidos }}
                @if($p->id_vivienda && $vivienda && $p->id_vivienda == $vivienda->id)
                <span class="text-success">(Actualmente en esta vivienda)</span>
                @endif
                    </label>
                @endforeach
                </div>
                <small class="text-muted">Puedes quitar pacientes de la vivienda o añadir nuevos.</small>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>

    </form>

  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");
    const nombre = document.getElementById("nombre");
    const capacidad = document.getElementById("capacidad");
    const lugar = document.getElementById("lugar");

    // Crear contenedor de error con el mismo estilo que los anteriores
    const textoError = document.createElement("div");
    textoError.id = "texto-error";
    textoError.className = "text-danger text-center mt-2";
    form.appendChild(textoError);

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Detener envío hasta validar

        // Limpiar errores previos
        textoError.textContent = "";
        [nombre, capacidad, lugar].forEach(i => i.style.borderColor = "");

        const nombreVal = nombre.value.trim();
        const capacidadVal = capacidad.value.trim();
        const lugarVal = lugar.value.trim();

        let error = "";

        // VALIDACIONES BÁSICAS (como antes)
        if (!nombreVal) {
            error = "El nombre es obligatorio.";
            nombre.style.borderColor = "red";
            nombre.focus();
        }
        else if (!capacidadVal || parseInt(capacidadVal) <= 0) {
            error = "La capacidad debe ser mayor que 0.";
            capacidad.style.borderColor = "red";
            capacidad.focus();
        }
        else if (!lugarVal) {
            error = "El lugar es obligatorio.";
            lugar.style.borderColor = "red";
            lugar.focus();
        }

        // VALIDACIÓN DE CAPACIDAD vs USUARIOS
        if (!error) {
            const capacidadNum = parseInt(capacidadVal);
            const usuariosMarcados = document.querySelectorAll("input[name='usuarios[]']:checked").length;

            if (usuariosMarcados > capacidadNum) {
                error = `No puedes asignar más de ${capacidadNum} usuarios.`;
                capacidad.style.borderColor = "red";
                capacidad.focus();
            }
        }

        // Si hay error → mostrarlo y NO enviar
        if (error) {
            textoError.textContent = error;
            return false;
        }

        // Si no hay errores → enviar formulario
        form.submit();
    });

});
</script>

@endsection