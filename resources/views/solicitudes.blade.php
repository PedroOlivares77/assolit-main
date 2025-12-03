@extends('baseAdmin')
@section('titulo','Solicitudes')
@section('info')

{{-- Solicitudes NUEVAS --}}
<h2 class="text-center mb-4">Solicitudes nuevas</h2>
<div id="solicitudes-nuevas" class="d-flex flex-column gap-3 mb-5 align-items-center">
    @foreach($solicitudes->where('estado','Nuevo') as $solicitud)
    <div class="card p-4 shadow w-75" style="max-width:700px;" data-id="{{ $solicitud->id }}">
        <h5>{{ $solicitud->nombre }}</h5>
        <p><b>Email:</b> {{ $solicitud->email }}</p>
        @if($solicitud->telefono)<p><b>Tel:</b> {{ $solicitud->telefono }}</p>@endif
        <p>{{ $solicitud->mensaje }}</p>
        <p><b>Estado:</b> 
            <span class="badge bg-warning text-dark">{{ $solicitud->estado }}</span>
        </p>
        <small class="text-muted"><b>Cliente:</b> {{ $solicitud->user->name ?? 'ID '.$solicitud->user_id }}</small>

        <form action="{{ route('adminSolicitudEstado', $solicitud->id) }}" method="POST" class="mt-2 marcar-leido-form w-100">
            @csrf
            <button type="submit" class="btn btn-secondary btn-sm w-100 btn-marcar">Marcar como Leída</button>
        </form>
    </div>
    @endforeach
</div>

{{-- Solicitudes LEÍDAS --}}
<h2 class="text-center mb-4">Solicitudes leídas</h2>
<div id="solicitudes-leidas" class="d-flex flex-column gap-2 align-items-center">
    @foreach($solicitudes->where('estado','Leída') as $solicitud)
    <div class="card p-2 shadow-sm small d-flex justify-content-between align-items-center w-75" style="max-width:700px;" data-id="{{ $solicitud->id }}">
        <div>
            <strong>{{ $solicitud->nombre }}</strong> – {{ Str::limit($solicitud->mensaje, 40) }}
        </div>
        <form action="{{ route('adminSolicitudEliminar', $solicitud->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
        </form>
    </div>
    @endforeach
</div>

{{-- JS para mover tarjetas al marcar como leído sin recargar --}}
<script>
document.querySelectorAll('.marcar-leido-form').forEach(form => {
    form.addEventListener('submit', function(e){
        e.preventDefault();
        let card = form.closest('.card');

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': form.querySelector('[name=_token]').value,
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(res => {
            if(res.ok){
                card.classList.remove('p-4');
                card.classList.add('p-2','shadow-sm','small');
                card.querySelector('.btn-marcar').remove();
                card.style.maxWidth = '700px';
                card.classList.add('w-75');
                document.getElementById('solicitudes-leidas').prepend(card);

                // Añadir botón de eliminar dinámicamente
                let eliminarForm = document.createElement('form');
                eliminarForm.method = 'POST';
                eliminarForm.action = '/admin/solicitudes/eliminar/' + card.dataset.id;
                eliminarForm.innerHTML = `
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                `;
                eliminarForm.classList.add('ms-2');
                card.appendChild(eliminarForm);
            }
        }).catch(err => console.error(err));
    });
});
</script>

@endsection