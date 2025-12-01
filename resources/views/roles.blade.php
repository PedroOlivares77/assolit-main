@extends('baseAdmin')
@section('titulo', 'Roles')
@section('info')
<h1 class="titulo text-center">Roles</h1>
    <div class="tabla">
        <div>
            <button type="button" id="btn-crear-rol" class="btn btn-success botonInsertar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-database-add"></i>+ Crear
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
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
            },
            "ajax": {
                "url": "{{ route('rolesListar') }}",
                "type": "GET",
                "dataType": "json",
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "dataSrc": function (response) {
                    if(response.status === 200) {
                        return response.roles;
                    }else{
                        return [];
                    }
                }
            },
            "columns": [
                {"data": "id"},
                {"data": "tipo"},
                @if(auth()->user())
                @if(!auth()->user()->hasRole('Psiquiatra') && !auth()->user()->hasRole('Trabajador_social'))
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<a href="#" class="btn btn-sm btn-warning edit-btn" data-id="'+data.id+'" data-tipo="'+data.tipo+'"><i class="fa-regular fa-pen-to-square"></i> Editar</a> ' +
                        '<a href="#" class="btn btn-sm btn-danger delete-btn" data-id="'+data.id+'"><i class="fa-solid fa-trash"></i> Eliminar</a>';
                    }
                }
                
                @endif
                @endif
            ],
            "createdRow": function(row, data, dataIndex) {
                //Añadir atributo data-id a cada fila
                $(row).attr('data-id', data.id);
            }
        });

        //Asignar evento click a las filas
        $("#tablaRoles tbody").on('click', 'tr', function(){
                var id = $(this).data('id'); //Obtener el ID de la fila pulsada
                if(id) {
                    window.location.href = '{{ route("buscarRol", ":id") }}'.replace(':id', id);
                }
        });

        $('#btn-crear-rol').click(function () {
                $('#rolAddModal').modal('show');
        });

        $('#rol-add-form').submit(function (e) {
            e.preventDefault();
            const rol = new FormData(this);
            var paginaActual = tabla.page();

            $.ajax({
                url: '{{ route("crearRoles") }}',
                method: 'POST',
                data: rol,
                processData: false,  // Importante, ya que estamos usando FormData
                contentType: false,  // Asegura que no se manipule el tipo de contenido
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 200) {
                        $('#rol-add-form')[0].reset();
                        $('#rolAddModal').modal('hide');

                        tabla.ajax.reload(function() {
                            // Después de recargar, mantener la misma página
                            tabla.page(paginaActual).draw(false);
                        });
                    }

                    alert(response.mensaje);
                },
                error: function(xhr, status, error) {
                    console.error(xhr); // Debugging: log the error
                    alert('Error: ' + error); // Show generic error message
                }
            });
        });

        @if(auth()->user())
        @if(!auth()->user()->hasRole('psiquiatra') && !auth()->user()->hasRole('trabajador_social'))
            $('#tablaRoles tbody').on('click', '.edit-btn', function (event) {
                event.stopPropagation();
                var id = $(this).data('id');
                var tipo = $(this).data('tipo');
            
                $('#edit-id').val(id);
                $('#edit-tipo').val(tipo);

                $('#rolEditModal').modal('show');
            });

            $('#rol-edit-form').submit(function (e) {
                if (confirm('¿Estás seguro de que desea editar este rol?')) {
                    e.preventDefault();
                    const rol = new FormData(this);
                    var paginaActual = tabla.page();

                    $.ajax({
                        url: '{{ route("mostrarEditarRoles", ":id") }}'.replace(':id', rol.get("id")),
                        method: 'POST',
                        data: rol,
                        processData: false,  // Importante, ya que estamos usando FormData
                        contentType: false,  // Asegura que no se manipule el tipo de contenido
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                $('#rol-edit-form')[0].reset();
                                $('#rolEditModal').modal('hide');

                                var row = tabla.row(function(idx, data, node) {
                                    return data.id === response.rol.id; 
                                });

                                row.data({
                                    "id": response.rol.id,
                                    "tipo": response.rol.tipo,
                                }).draw();

                                tabla.page(paginaActual).draw('page');
                            }

                            alert(response.mensaje);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr); // Debugging: log the error
                            alert('Error: ' + error); // Show generic error message
                        }
                    });
                }
            });

            $('#tablaRoles tbody').on('click', '.delete-btn', function(event) {
                event.stopPropagation();
                var id = $(this).data('id');
                var row = $(this).closest('tr');

                if (confirm('¿Estás seguro de que desea eliminar este rol?')) {
                    $.ajax({
                        url: '{{ route("eliminarRoles", ":id") }}'.replace(':id', id),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                row.remove().draw(); // Reload the table data
                            }

                            alert(response.mensaje); // Show success message
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr); // Debugging: log the error
                            alert('Error: ' + error); // Show generic error message
                        }
                    });
                }
            });
        @endif
        @endif

    });

</script>

@endsection