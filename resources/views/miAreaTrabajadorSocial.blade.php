@extends('baseUsuario')
@section('titulo','Área Trabajador Social')
@section('contenido')

<h2 class="text-center mb-4">Usuarios de tu vivienda</h2>

<div class="d-flex flex-wrap justify-content-center gap-4">
@foreach($usuarios as $usuario)
<div class="card shadow p-4" style="width: 350px; border-left: 5px solid #6c757d;">

    <!-- IMAGEN DE PERFIL GENERICA -->
    <div class="text-center mb-3">
        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" 
             width="90" 
             class="rounded-circle p-2 bg-light border">
    </div>

    <!-- NOMBRE -->
    <h5 class="text-center mb-2">
        {{ $usuario->nombre }} {{ $usuario->apellidos }}
    </h5>

    <!-- VIVIENDA -->
    <p class="text-center text-muted">
        <b>Vivienda:</b> {{ $usuario->vivienda->nombre ?? 'Sin vivienda asignada' }}
    </p>

    <hr>

    <!-- FECHA NACIMIENTO -->
    <p><b>Fecha de nacimiento:</b> {{ $usuario->fecha_nacimiento }}</p>

    <!-- PATOLOGIA -->
    <p><b>Patología:</b> 
        <span class="badge bg-secondary">{{ $usuario->patologia ?? 'No registrada' }}</span>
    </p>

    <!-- MEDICAMENTOS MOSTRANDO SOLO SI ES = 1 -->
    <h6 class="mt-3"><b>Tratamiento:</b></h6>

    @if($usuario->medicamentos->count())
        @foreach($usuario->medicamentos as $med)

        <div class="border rounded p-2 mb-2 bg-light">
            <div class="d-flex justify-content-between">
                <span><b>{{ $med->nombre }}</b></span>
            </div>

            <!-- SOLO MOSTRAR FRANJAS ACTIVAS -->
            <div class="mt-2">
                @if($med->pivot->desayuno == 1)
                    <span class="badge bg-warning text-dark">Desayuno</span>
                @endif

                @if($med->pivot->comida == 1)
                    <span class="badge bg-success">Comida</span>
                @endif

                @if($med->pivot->cena == 1)
                    <span class="badge bg-info text-dark">Cena</span>
                @endif
            </div>

        </div>

        @endforeach
    @else
        <p class="text-muted">Sin medicamentos asignados</p>
    @endif

    <div class="text-end">
        <small class="text-muted">Registrado: {{ $usuario->created_at }}</small>
    </div>

</div>
@endforeach
</div>

@endsection