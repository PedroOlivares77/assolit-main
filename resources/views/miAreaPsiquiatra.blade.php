@extends('baseUsuario')
@section('titulo','Área Psiquiatra')
@section('contenido')

<h2 class="text-center mb-4 mt-4">Usuarios de tus viviendas</h2>

@if(session('ok'))
<div class="alert alert-success text-center">{{ session('ok') }}</div>
@endif

<!-- Selector de viviendas -->
<div class="text-center mb-4">
    @foreach($viviendasPsiquiatra as $viv)
        <a href="{{ route('miAreaPsiquiatra', ['vivienda_id' => $viv->id]) }}" 
           class="btn btn-lg mb-2 me-2 {{ $selectedViviendaId == $viv->id ? 'btn-primary' : 'btn-outline-primary' }}">
           {{ $viv->nombre }}
        </a>
    @endforeach
</div>

<div class="d-flex flex-wrap justify-content-center gap-4 mb-4">
@foreach($usuarios as $usuario)
    @if($usuario->id_vivienda != $selectedViviendaId)
        @continue
    @endif

    <div class="card shadow p-4 d-flex flex-column h-100" style="width: 350px; border-left: 5px solid #6c757d;">

        <!-- Imagen genérica -->
        <div class="text-center mb-3">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" 
                 width="90" 
                 class="rounded-circle p-2 bg-light border">
        </div>

        <!-- Nombre y vivienda -->
        <h5 class="text-center mb-2">{{ $usuario->nombre }} {{ $usuario->apellidos }}</h5>
        <p class="text-center text-muted"><b>Vivienda:</b> <span class="badge bg-secondary">{{ $usuario->vivienda->nombre ?? 'N/A' }}</span></p>

        <hr>

        <!-- Fecha nacimiento -->
        <p><b>Fecha de nacimiento:</b> {{ $usuario->fecha_nacimiento }}</p>

        <!-- Formulario editable -->
        <form action="{{ route('miAreaPsiquiatraPost', $usuario->id) }}" method="POST">
            @csrf

            <!-- Patología -->
            <div class="mb-2">
                <label class="form-label"><b>Patología:</b></label>
                <textarea name="patologia" class="form-control" rows="2">{{ $usuario->patologia }}</textarea>
            </div>

            <!-- Añadir medicamento nuevo -->
            <div class="mb-2">
                <select class="form-select form-select-sm" id="select-medicamento-{{ $usuario->id }}">
                    <option value="">Selecciona un medicamento</option>
                    @foreach($medicamentos as $med)
                        @if(!$usuario->medicamentos->contains('id', $med->id))
                            <option value="{{ $med->id }}">{{ $med->nombre }} ({{ $med->dosis }}mg)</option>
                        @endif
                    @endforeach
                </select>
                <button type="button" class="btn btn-secondary mt-1 w-100 btn-sm"
                        onclick="agregarMedicamento({{ $usuario->id }})">Agregar</button>
            </div>

            <!-- Medicamentos actuales -->
            <div id="medicamentos-container-{{ $usuario->id }}" class="flex-grow-1 overflow-auto mb-2">
            @foreach($usuario->medicamentos as $med)
                <div class="border rounded p-2 mb-2 bg-light d-flex justify-content-between align-items-center" data-med-id="{{ $med->id }}">
                    <span>{{ $med->nombre }} ({{ $med->dosis }}mg)</span>
                    <button type="button" class="btn btn-sm btn-danger p-1" onclick="eliminarMedicamento(this)">✕</button>
                </div>
                <div class="d-flex gap-2 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="medicamentos[{{ $med->id }}][desayuno]" value="1" {{ $med->pivot->desayuno ? 'checked' : '' }}>
                        <label class="form-check-label">Desayuno</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="medicamentos[{{ $med->id }}][comida]" value="1" {{ $med->pivot->comida ? 'checked' : '' }}>
                        <label class="form-check-label">Comida</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="medicamentos[{{ $med->id }}][cena]" value="1" {{ $med->pivot->cena ? 'checked' : '' }}>
                        <label class="form-check-label">Cena</label>
                    </div>
                </div>
            @endforeach
            </div>

            <button class="btn btn-primary btn-sm mt-2 w-100">Guardar cambios</button>
        </form>

        <div class="text-end mt-2">
            <small class="text-muted">Registrado: {{ $usuario->created_at }}</small>
        </div>

    </div>
@endforeach
</div>

<script>
function agregarMedicamento(usuarioId){
    let select = document.getElementById('select-medicamento-' + usuarioId);
    let medId = select.value;
    if(!medId) return;

    let medNombre = select.options[select.selectedIndex].text;
    let container = document.getElementById('medicamentos-container-' + usuarioId);

    let html = `
    <div class="border rounded p-2 mb-2 bg-light d-flex justify-content-between align-items-center" data-med-id="${medId}">
        <span>${medNombre}</span>
        <button type="button" class="btn btn-sm btn-danger p-1" onclick="eliminarMedicamento(this)">✕</button>
    </div>
    <div class="d-flex gap-2 mb-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                   name="medicamentos[${medId}][desayuno]" value="1">
            <label class="form-check-label">Desayuno</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                   name="medicamentos[${medId}][comida]" value="1">
            <label class="form-check-label">Comida</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                   name="medicamentos[${medId}][cena]" value="1">
            <label class="form-check-label">Cena</label>
        </div>
    </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    select.remove(select.selectedIndex);
    select.value = "";
}

function eliminarMedicamento(btn){
    let div = btn.closest('div[data-med-id]');
    div.nextElementSibling?.remove(); // elimina los checkboxes
    div.remove(); // elimina el nombre del medicamento
}
</script>

@endsection