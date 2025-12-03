@extends('baseUsuario')
@section('titulo','Área Psiquiatra')
@section('contenido')

<h2 class="text-center mb-4">Usuarios de tus viviendas</h2>

<div class="d-flex flex-wrap justify-content-center gap-4">
@foreach($usuarios as $usuario)
<div class="card shadow p-4" style="width: 350px;">
    <h5>{{ $usuario->nombre }} {{ $usuario->apellidos }}</h5>
    <p><b>Fecha de nacimiento:</b> {{ $usuario->fecha_nacimiento }}</p>

    <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label class="form-label">Patología:</label>
            <textarea name="patologia" class="form-control" rows="2">{{ $usuario->patologia }}</textarea>
        </div>

        <h6>Medicamentos</h6>
        @foreach($usuario->medicamentos as $med)
        <div class="d-flex gap-2 mb-1">
            <input type="hidden" name="medicamentos[]" value="{{ $med->id }}">
            <input type="text" class="form-control" value="{{ $med->nombre }}" disabled>
            <input type="text" class="form-control" name="desayuno[]" placeholder="Desayuno" value="{{ $med->pivot->desayuno }}">
            <input type="text" class="form-control" name="comida[]" placeholder="Comida" value="{{ $med->pivot->comida }}">
            <input type="text" class="form-control" name="cena[]" placeholder="Cena" value="{{ $med->pivot->cena }}">
        </div>
        @endforeach

        <button class="btn btn-success btn-sm mt-2 w-100">Guardar cambios</button>
    </form>
</div>
@endforeach
</div>

@endsection