@extends('baseAdmin')
@section('titulo', 'Editar rol')
@section('info')
    <h3 class="titulo text-center">Editar rol</h3>
        <div class="form mb-3 formulario col-2 mx-auto">
            <form action="{{route('mostrarEditarRoles', $rol->id)}}" method="post" class="form-validate">
                @csrf
                <div class="mb-4">
                    <label class="form-label" for="tipo">Tipo</label>
                    <input class="form-control" type="text" name="tipo" id="tipo" value="{{$rol->tipo}}">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary my-3" type="submit">Enviar</button>
                </div>
            </form>
            <div id="texto-error" class="text-danger text-center"></div>
        </div>
 <script>
$(document).ready(function() {

    // Enfocar automáticamente el input tipo
    $("#tipo").focus();

    // Función de validación
    function validarFormulario() {
        let tipo = $("#tipo").val().trim();
        let error = "";

        // Limpiar estilos anteriores
        $('#texto-error').html("");
        $('#tipo').css("border-color", "var(--bs-border-color)");

        if (!tipo) {
            error = "El campo Tipo es obligatorio.";
            $("#tipo").css("border-color", "red").focus();
        }

        return error;
    }

    // Evento submit
    $(".form-validate").on("submit", function(e) {
        e.preventDefault();

        let error = validarFormulario();

        if (error) {
            $("#texto-error").html(error);
        } else {
            // Si todo está bien, enviar el formulario
            this.submit();
        }
    });

});
</script>
@endsection