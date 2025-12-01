    @extends('baseAdmin')
    @section('titulo', 'Formulario Medicamento')
    @section('info')
    <h3 class="titulo text-center">Formulario Medicamento</h3>
    <div class="row justify-content-center">
        <div class="col-md-4 bg-white p-4 rounded shadow m-4 mb-5">
            @if (empty($medicamento))
                <form action="{{route('crearMedicamento')}}" method="post" class="form-validate">
            @else
                <form action="{{route('editarMedicamento', $medicamento->id)}}" method="post" class="form-validate">
            @endif
                @csrf
                @isset($pais)
                    {{-- con ?? '' le indico que si no existe lo tome como un string vacío --}}
                    <input class="form-control" type="hidden" name="id" value="{{$medicamento->id ?? ''}}">    
                @endisset
                <div class="mb-4">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{$medicamento->nombre ?? ''}}">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="dosis">Dosis</label>
                    <input class="form-control" type="number" name="dosis" id="dosis" value="{{$medicamento->dosis ?? ''}}">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary my-3" type="submit">Enviar</button>
                </div>
                <div id="texto-error" class="text-danger text-center"></div>
            </form>
        </div>
    </div>
    <script>
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