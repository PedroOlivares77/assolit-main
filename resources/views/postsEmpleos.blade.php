@extends('baseAdmin')
@section('titulo', 'Ofertas de Empleo')
@section('info')

<h1 class="titulo text-center mb-3">Ofertas de Empleo</h1>

<div class="text-center mb-4">
    <button id="btn-crear" class="btn btn-success">+ Crear Oferta</button>
</div>

<div id="posts-container" class="d-flex flex-wrap justify-content-start gap-3">

    @foreach($posts as $post)
    <div class="card shadow p-3 mb-3" style="width: 30%; min-width: 250px;" data-id="{{ $post->id }}">
        <h5 class="card-title">{{ $post->titulo }}</h5>
        <p class="card-text">{{ $post->body }}</p>
        <div class="d-flex justify-content-between mt-2">
            <button class="btn btn-sm btn-warning btn-editar">Editar</button>
            <form action="{{ route('eliminarPost', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    @endforeach

</div>

<script>
// Crear nueva oferta
document.getElementById('btn-crear').addEventListener('click', function() {
    let formHtml = `
        <div class="card shadow p-3 mb-3" style="width: 30%; min-width: 250px;">
            <form action="{{ route('crearPost') }}" method="post">
                @csrf
                <div class="mb-2">
                    <input type="text" name="titulo" class="form-control" placeholder="Título">
                </div>
                <div class="mb-2">
                    <textarea name="body" class="form-control" placeholder="Descripción"></textarea>
                </div>
                <input type="hidden" name="id_vivienda" value="1">
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm cancelar">Cancelar</button>
                </div>
            </form>
        </div>
    `;
    let container = document.getElementById('posts-container');
    container.insertAdjacentHTML('afterbegin', formHtml);

    container.querySelector('.cancelar').addEventListener('click', function() {
        this.closest('.card').remove();
    });
});

// Editar oferta (igual que Crear)
document.querySelectorAll('.btn-editar').forEach(button => {
    button.addEventListener('click', function() {
        let card = this.closest('.card');
        let id = card.dataset.id;
        let titulo = card.querySelector('.card-title').innerText;
        let body = card.querySelector('.card-text').innerText;

        let formHtml = `
            <form action="/admin/posts/editar/${id}" method="POST">
                @csrf
                <div class="mb-2">
                    <input type="text" name="titulo" class="form-control" value="${titulo}" placeholder="Título">
                </div>
                <div class="mb-2">
                    <textarea name="body" class="form-control" placeholder="Descripción">${body}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm cancelar">Cancelar</button>
                </div>
            </form>
        `;

        card.innerHTML = formHtml;

        card.querySelector('.cancelar').addEventListener('click', function() {
            card.innerHTML = `
                <h5 class="card-title">${titulo}</h5>
                <p class="card-text">${body}</p>
                <div class="d-flex justify-content-between mt-2">
                    <button class="btn btn-sm btn-warning btn-editar">Editar</button>
                    <form action="/admin/posts/eliminar/${id}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            `;
            // Reasignar el evento de editar al botón restaurado
            card.querySelector('.btn-editar').addEventListener('click', arguments.callee);
        });
    });
});
</script>

@endsection