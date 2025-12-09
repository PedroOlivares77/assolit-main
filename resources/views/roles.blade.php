@extends('baseAdmin')
@section('titulo', 'Roles')
@section('info')
<h1 class="titulo text-center">Roles</h1>
    <div class="tabla">
        <div>
            <button type="button" id="btn-crear-rol" class="btn btn-success botonInsertar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-database-add"></i>Crear
            </button>
        </div>
        <table id="tablaRoles" class="interactuable table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Tipo
                    </th>
                </tr>
            </thead>
        </table>
    </div>

<!-- Modal para editar -->
<div class="modal fade" id="rolEditModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rol-edit-form" method="POST" action="#">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="row">
                        <div class="col-lg">
                            <label>Tipo</label>
                            <input type="text" id="edit-tipo" name="tipo" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" form="rol-edit-form">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para crear -->
<div class="modal fade" id="rolAddModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Crear rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rol-add-form" method="POST" action="#">
                    <div class="row">
                        <div class="col-lg">
                            <label>Tipo</label>
                            <input type="text" id="add-tipo" name="tipo" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" form="rol-add-form">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {

    var tabla = new DataTable('#tablaRoles', {
        language: { url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json' },
        ajax: {
            url: '{{ route("rolesListar") }}',
            type: 'GET',
            dataSrc: function(response) {
                return response.status === 200 ? response.roles : [];
            }
        },
        columns: [
            { data: 'id' },
            { data: 'tipo' },
            @if(auth()->user())
            @if(!auth()->user()->hasRole('psiquiatra') && !auth()->user()->hasRole('trabajador_social'))
            {
                data: null,
                render: function(data){
                    return `
                        <a href="#" class="btn btn-sm btn-warning edit-btn" data-id="${data.id}" data-tipo="${data.tipo}">Editar</a>
                        <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="${data.id}">Eliminar</a>
                    `;
                }
            }
            @endif
            @endif
        ]
    });

    // CREAR
    $('#btn-crear-rol').click(function() {
        $('#rolAddModal').modal('show');
        $('#rol-add-form')[0].reset();
    });

    $('#rol-add-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("crearRoles") }}',
            type: 'POST',
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(response) {
                alert(response.mensaje);
                if(response.status === 200){
                    $('#rolAddModal').modal('hide');
                    tabla.ajax.reload(null,false);
                }
            },
            error: function(xhr){ alert('Error al crear rol'); console.error(xhr); }
        });
    });

    // EDITAR
    $('#tablaRoles tbody').on('click', '.edit-btn', function(e){
        e.stopPropagation();
        $('#edit-id').val($(this).data('id'));
        $('#edit-tipo').val($(this).data('tipo'));
        $('#rolEditModal').modal('show');
    });

    $('#rol-edit-form').submit(function(e){
        e.preventDefault();
        var id = $('#edit-id').val();
        if(!confirm('¿Seguro que deseas editar este rol?')) return;

        $.ajax({
            url: '{{ route("editarRoles", ":id") }}'.replace(':id', id),
            type: 'POST',
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(response){
                alert(response.mensaje);
                if(response.status === 200){
                    $('#rolEditModal').modal('hide');
                    tabla.ajax.reload(null,false);
                }
            },
            error: function(xhr){ alert('Error al editar rol'); console.error(xhr); }
        });
    });

    // ELIMINAR
    $('#tablaRoles tbody').on('click', '.delete-btn', function(e){
        e.stopPropagation();
        if(!confirm('¿Seguro que deseas eliminar este rol?')) return;

        var id = $(this).data('id');
        var row = tabla.row($(this).parents('tr'));

        $.ajax({
            url: '{{ route("eliminarRoles", ":id") }}'.replace(':id', id),
            type: 'DELETE',
            data: {_token: '{{ csrf_token() }}'},
            success: function(response){
                alert(response.mensaje);
                if(response.status === 200){
                    row.remove().draw(false);
                }
            },
            error: function(xhr){ alert('Error al eliminar rol'); console.error(xhr); }
        });
    });

    // CLICK EN FILA
    $('#tablaRoles tbody').on('click', 'tr', function(){
        var id = $(this).data('id');
        if(id){
            window.location.href = '{{ route("buscarRol", ":id") }}'.replace(':id', id);
        }
    });

});
</script>

@endsection