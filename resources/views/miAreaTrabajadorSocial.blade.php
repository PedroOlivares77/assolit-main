@extends('baseUsuario')
@section('titulo','Área Trabajador Social')
@section('contenido')

<h2 class="text-center mb-4">Usuarios de tu vivienda</h2>

<div class="d-flex flex-wrap justify-content-center gap-4">
@foreach($usuarios as $usuario)
<div class="card shadow p-4" style="width: 350px;">
    <h5>{{ $usuario->nombre }} {{ $usuario->apellidos }}</h5>
    <p><b>Fecha de nacimiento:</b> {{ $usuario->fecha_nacimiento }}</p>
    <p><b>Patología:</b> {{ $usuario->patologia ?? 'No registrada' }}</p>

    <h6 class="mt-3">Medicamentos:</h6>
    @if($usuario->medicamentos->count())
        <ul class="list-group list-group-flush mb-2">
            @foreach($usuario->medicamentos as $med)
                <li class="list-group-item p-1">
                    {{ $med->nombre }} –
                    Desayuno: {{ $med->pivot->desayuno ?? '-' }},
                    Comida: {{ $med->pivot->comida ?? '-' }},
                    Cena: {{ $med->pivot->cena ?? '-' }}
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Sin medicamentos asignados</p>
    @endif
</div>
@endforeach
</div>

@endsection