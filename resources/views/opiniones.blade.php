@extends('baseAdmin')
@section('titulo', 'Opiniones')
@section('info')

<h1 class="titulo text-center mb-5" >Opiniones</h1>

<div class="text-center mb-3">
    <button id="btn-crear" class="btn btn-success">Crear</button>
</div>

<div class="postit-container d-flex flex-wrap justify-content-center" style="gap: 1rem; max-width: 840px; margin:auto;">
    @foreach($opiniones->take(6) as $opinion)
    <div class="postit p-4 shadow rounded position-relative" style="width: 260px; height: 260px; background-color: #fff3b0;">
        <div class="postit-content">
            <p><strong>{{ $opinion->autor }}</strong></p>
            <p>{{ $opinion->comentario }}</p>
            <p>Valoración: {{ $opinion->valoracion }}/5</p>
        </div>
        <div class="postit-actions mt-2 text-center">
            <button class="btn btn-primary btn-sm btn-editar">Editar</button>
            <form action="{{ route('eliminarOpinion', $opinion->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Borrar</button>
            </form>
        </div>
        <form action="{{ route('editarOpinion', $opinion->id) }}" method="POST" class="postit-form mt-2" style="display:none;">
            <button type="button" class="btn-close cancel-edit" aria-label="Cerrar"
            style="position:absolute; top:10px; right:10px;"></button>
            @csrf
            <textarea name="comentario" class="form-control mb-2" style="height:100px;">{{ $opinion->comentario }}</textarea>
            <input type="number" name="valoracion" class="form-control mb-2" value="{{ $opinion->valoracion }}" min="1" max="5">
            <input type="text" name="autor" class="form-control mb-2" value="{{ $opinion->autor }}">
            <button class="btn btn-success btn-sm w-100">Guardar</button>
        </form>
    </div>
    @endforeach
</div>

<script>
document.querySelectorAll('.btn-editar').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const postit = btn.closest('.postit');
        const content = postit.querySelector('.postit-content');
        const form = postit.querySelector('.postit-form');
        content.style.display = content.style.display === 'none' ? 'block' : 'none';
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
});

document.querySelectorAll('.cancel-edit').forEach(btn => {
    btn.addEventListener('click', function () {
        const postit = btn.closest('.postit');
        postit.querySelector('.postit-content').style.display = 'block';
        postit.querySelector('.postit-form').style.display = 'none';
    });
});

document.getElementById('btn-crear').addEventListener('click', function() {
    const container = document.querySelector('.postit-container');
    if (container.children.length >= 6) return alert('Máximo 6 postits');
    const postit = document.createElement('div');
    postit.className = 'postit p-4 shadow rounded position-relative';
    postit.style = "width:260px; height:260px; background-color:#b0f7d3;";
    postit.innerHTML = `
    <button type="button" class="btn-close cancel-create"
            style="position:absolute; top:10px; right:10px;"></button>
        <form action="{{ route('crearOpinion') }}" method="POST">
            @csrf
            <input type="hidden" name="id_vivienda" value="1">
            <textarea name="comentario" class="form-control mb-2" placeholder="Comentario" style="height:120px;"></textarea>
            <input type="number" name="valoracion" class="form-control mb-2" placeholder="Valoración 1-5" min="1" max="5">
            <input type="text" name="autor" class="form-control mb-2" placeholder="Autor">
            <button class="btn btn-success btn-sm w-100">Crear</button>
        </form>
    `;
    container.prepend(postit);
    postit.querySelector('.cancel-create').addEventListener('click', function () {
    postit.remove();
});
});
</script>
@endsection