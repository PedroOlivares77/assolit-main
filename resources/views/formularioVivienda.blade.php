@extends('baseAdmin')
@section('titulo', 'Formulario Vivienda')
@section('info')
<h3 class="titulo text-center">{{ $vivienda ? 'Editar Vivienda' : 'Crear Vivienda' }}</h3>
<div class="row justify-content-center">
    <div class="col-md-8 bg-white p-4 rounded shadow m-4 mb-5">
        <form action="{{ $vivienda ? route('editarVivienda', $vivienda->id) : route('crearVivienda') }}" method="post">
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

            <div class="row mb-4">
                <div class="col">
                    <label>Asignar Users</label>
                    <select multiple class="form-control" name="users[]" size="6">
                        @foreach($usersDisponibles as $user)
                            <option value="{{ $user->id }}">{{ $user->nombre }} ({{ $user->rol->tipo }})</option>
                        @endforeach
                        @foreach($usersAsignados as $user)
                            <option value="{{ $user->id }}" selected>{{ $user->nombre }} ({{ $user->rol->tipo }})</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Mantén presionada Ctrl/Cmd para seleccionar varios.</small>
                </div>
                <div class="col">
                    <label>Asignar Usuarios</label>
                    <select multiple class="form-control" name="usuarios[]" size="6">
                        @foreach($usuariosDisponibles as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellidos }}</option>
                        @endforeach
                        @foreach($usuariosAsignados as $usuario)
                            <option value="{{ $usuario->id }}" selected>{{ $usuario->nombre }} {{ $usuario->apellidos }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Mantén presionada Ctrl/Cmd para seleccionar varios.</small>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-primary my-3" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection