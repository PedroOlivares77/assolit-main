@extends('baseAdmin')
@section('titulo', 'Viviendas')
@section('info')

<h1 class="titulo text-center">Viviendas</h1>

<div class="mb-3">
    <a href="{{ route('formularioViviendasIns') }}" class="btn btn-success">Crear</a>
</div>

<div class="d-flex justify-content-center flex-wrap gap-2 my-3">
    @foreach($viviendas as $viv)
    <button class="btn btn-outline-primary"
        onclick="mostrarVivienda({{ $viv->id }})">
        {{ $viv->nombre }}
    </button>
    @endforeach
</div>

@foreach($viviendas as $viv)
<div id="bloque-vivienda-{{ $viv->id }}" style="display:none;" class="container mb-5">

    <div class="card p-3 shadow-sm rounded-2 mb-3">
        <h5 class="fw-bold">{{ $viv->nombre }}</h5>
        <p class="mb-1">📍 Lugar: {{ $viv->lugar }}</p>
        <p class="mb-1">👥 Capacidad: {{ $viv->capacidad }}</p>
        <a href="{{ route('formularioViviendaEd', $viv->id) }}">
           <button class="btn btn-sm btn-warning mt-2" > Editar </button>
        </a>
        <form action="{{ route('eliminarVivienda', $viv->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger mt-3">
                Eliminar
            </button>
        </form>
    </div>

    <table class="table table-bordered small vivienda-dt mt-3" id="dt-users-{{ $viv->id }}">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre Completo</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viv->users as $us)
            <tr>
                <td>{{ $us->id }}</td>
                <td>{{ $us->rol->tipo}}</td>
                <td>{{ $us->nombre }} {{ $us->apellidos }}</td>
                <td>{{ $us->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-striped small vivienda-dt mt-3" id="dt-usuarios-{{ $viv->id }}">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Patología</th>
                <th>Fecha Nac.</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viv->usuarios as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->nombre }} {{ $u->apellidos }}</td>
                <td>{{ $u->patologia }}</td>
                <td>{{ $u->fecha_nacimiento }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endforeach


<script>
    function mostrarVivienda(id) {
        // Ocultar todos los bloques
        @foreach($viviendas as $viv)
        document.getElementById('bloque-vivienda-{{ $viv->id }}').style.display = 'none';
        @endforeach

        // Mostrar el bloque elegido
        document.getElementById('bloque-vivienda-' + id).style.display = 'block';
    }

    // Mostrar la primera vivienda al cargar la página
    window.addEventListener('DOMContentLoaded', (event) => {
        @if(count($viviendas) > 0)
            mostrarVivienda({{ $viviendas[0]->id }});
        @endif
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    @foreach($viviendas as $viv)
        new DataTable('#dt-users-{{ $viv->id }}', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json'
            }
        });
        new DataTable('#dt-usuarios-{{ $viv->id }}', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json'
            }
        });
    @endforeach
});
</script>

@endsection
