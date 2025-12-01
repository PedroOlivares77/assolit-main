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
        $(document).ready(function(){

            $("#tipo").focus();

            function isValid(){
                var isValid = true;
                $(".form-validate input").each(function(){
                    if( $(this).val().trim() === "" ){
                        $(this).focus();
                        $(this).css("border-color", "red");
                        isValid = false;
                        return isValid;
                    }
                });
                return isValid;
            }

            $(".form-validate :submit").click(function (e){

                $('#texto-error').html("");
                $('input').css("border-color", "var(--bs-border-color)");

                e.preventDefault();
                if(isValid()){
                    $(".form-validate").submit()
                }else{
                    $('#tipo').focus();
                    $('#tipo').css("border-color", "red");
                    $('#texto-error').html("No se puede enviar con campos vacíos"); 
                }
            });

            
        });
    </script>
@endsection