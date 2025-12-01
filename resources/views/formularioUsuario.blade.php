    @extends('baseAdmin')
    @section('titulo', 'Formulario Usuario')
    @section('info')
    <h3 class="titulo text-center">Formulario Usuario</h3>
    <div class="row justify-content-center">
        <div class="col-md-4 bg-white p-4 rounded shadow m-4 mb-5">
            @if (empty($usuario))
            <form action="{{route('crearUsuario')}}" method="post" class="form-validate">
                @else
                <form action="{{route('editarUsuario', $usuario->id)}}" method="post" class="form-validate">
                    @endif
                    @csrf
                    @isset($usuario)
                    {{-- con ?? '' le indico que si no existe lo tome como un string vacío --}}
                    <input class="form-control" type="hidden" name="id" value="{{$usuario->id ?? ''}}">
                    @endisset
                    <div class="mb-4">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{$usuario->nombre ?? ''}}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="apellidos">Apellidos</label>
                        <input class="form-control" type="text" name="apellidos" id="apellidos" value="{{$usuario->apellidos ?? ''}}">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$usuario->fecha_nacimiento ?? ''}}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="patologia">Patología</label>
                        <input class="form-control" type="text" name="patologia" id="patologia" value="{{$usuario->patologia ?? ''}}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="id_vivienda">Vivienda</label>
                        <select name="id_vivienda" id="id_vivienda" class="form-control">
                            @if (empty($usuario))
                            <option value="" selected disabled>---- Elija una opción ----</option>
                            <@foreach($viviendas as $vivienda)
                                <option value="{{ $vivienda->id }}">{{ $vivienda->nombre }}</option>
                                @endforeach
                                @else
                                <@foreach($viviendas as $vivienda)
                                    <option value="{{ $vivienda->id }}" {{$vivienda->id == $usuario->vivienda->id ? 'selected' : '' }}>
                                    {{ $vivienda->nombre }}
                                    </option>
                                    @endforeach
                                    @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Seleccionar medicamento</label>
                        <select id="medicamento-select" class="form-control">
                            <option value="" disabled selected>---- Elige medicamento ----</option>
                            @foreach($medicamentos as $med)
                            <option value="{{ $med->id }}" data-nombre="{{ $med->nombre }}" data-dosis="{{ $med->dosis }}">
                                {{ $med->nombre }} ({{ $med->dosis }}mg)
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="medicamentos-container" class="mb-4"></div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary my-3" type="submit">Enviar</button>
                    </div>
                    <div id="texto-error" class="text-danger text-center"></div>
                </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            // PRE-CARGAR en modo edición los medicamentos que ya tiene el usuario
            @isset($usuario)
            @foreach($usuario->medicamentos as $m)
            agregarMedicamento(
                "{{ $m->id }}",
                "{{ $m->nombre }}",
                "{{ $m->dosis }}",
                {{ $m->pivot->desayuno ? 1 : 0 }},
                {{ $m->pivot->comida ? 1 : 0 }},
                {{ $m->pivot->cena ? 1 : 0 }}
            );
            @endforeach
            @endisset


            $('#medicamento-select').change(function() {
                let option = $(this).find(':selected');
                if (!option.val()) return;

                let id = option.val();
                let nombre = option.data('nombre');
                let dosis = option.data('dosis');

                agregarMedicamento(id, nombre, dosis);
                $(this).val(""); // resetear select para volver a elegir
            });


            function agregarMedicamento(id, nombre, dosis, desayuno = 0, comida = 0, cena = 0) {

                // evitar que se agregue 2 veces el mismo med
                if ($(`#medicamento-bloque-${id}`).length) return;

                $('#medicamentos-container').append(`
        <div id="medicamento-bloque-${id}" class="border p-3 rounded mb-2">
            <p class="mb-2"><strong>${nombre}</strong> <small>(${dosis}mg)</small></p>

            <input type="hidden" name="medicamentos[]" value="${id}">

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="med_turnos[${id}][desayuno]" value="1" ${desayuno ? "checked" : ""}>
                <label class="form-check-label small">desayuno</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="med_turnos[${id}][comida]" value="1" ${comida ? "checked" : ""}>
                <label class="form-check-label small">comida</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="med_turnos[${id}][cena]" value="1" ${cena ? "checked" : ""}>
                <label class="form-check-label small">cena</label>
            </div>

            <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="eliminarMedicamento(${id})">Quitar</button>
        </div>
        `);
            }

            // hacerlo global para que la view pueda llamarlo
            window.eliminarMedicamento = function(id) {
                $(`#medicamento-bloque-${id}`).remove();
            }

        });
        // $(document).ready(function(){

        //     $("#nombre").focus();

        //     $(".form-validate :submit").click(function (e){

        //         $('#texto-error').html("");
        //         $('select, input').css("border-color", "var(--bs-border-color)"); 

        //         e.preventDefault();
        //         if($("#nombre").val().trim() === ""){
        //             $("#nombre").focus();
        //             $('#nombre').css("border-color", "red");
        //             $('#texto-error').html("El nombre no puede estar vacío.");
        //         }else{
        //             if(!$("#continente").val()){
        //                 $("#continente").focus();
        //                 $('#continente').css("border-color", "red");
        //                 $('#texto-error').html("Debe elegir un continente.");
        //             }else{
        //                 $(".form-validate").submit()
        //             }
        //         }
        //     });


        // });
    </script>
    @endsection