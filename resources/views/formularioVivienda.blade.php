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

@endsection