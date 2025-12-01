
    @extends('baseAdmin')
    @section('titulo', 'Formulario User')
    @section('info')
    <h3 class="titulo text-center">Formulario User</h3>
    <div class="row justify-content-center">
        <div class="col-md-4 bg-white p-4 rounded shadow m-4 mb-5">
            @if (empty($user))
                <form action="{{route('crearUser')}}" method="post" class="form-validate" id="crearUser">
            @else
                <form action="{{route('editarUser', $user->id)}}" method="post" class="form-validate" id="crearUser">
            @endif
                @csrf
                @isset($user)
                {{-- con ?? '' le indico que si no existe lo tome como un string vacío --}}
                <input class="form-control" type="hidden" name="id" value="{{$user->id ?? ''}}">
                @endisset

                <div class="mb-4">
                    <label class="form-label" for="id_rol">Rol</label>
                    <select name="id_rol" id="id_rol" class="form-control">
                        @if (empty($user))
                            <option value="" selected disabled>---- Elija una opción ----</option>
                            <@foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->tipo }}</option>
                        @endforeach
                        @else
                            <@foreach($roles as $rol)
                            <option value="{{ $rol->id }}" {{$rol->id == $user->rol->id ? 'selected' : '' }}>
                                {{ $rol->tipo }}
                            </option>
                            @endforeach  
                        @endif  
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="name" value="{{$user->nombre ?? ''}}">
                </div>

                <div class="mb-4">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input class="form-control" type="text" name="apellidos" id="apellidos" value="{{$user->apellidos ?? ''}}">
                </div>

                <div class="mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{$user->email ?? ''}}">
                </div>

                <div class="mb-4">
                    <label class="form-label" for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{$user->password ?? ''}}">
                </div>
                
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary my-3" type="submit" id="enviar">Confirmar</button>
                </div>
            </form>
            <div id="texto-error" class="text-danger text-center"></div>
        </div>
    </div>
    <script>
        // $(document).ready(function(){

        //     var inputs = document.getElementsByTagName("input");

        //     $('#id_rol').focus();



        //     $("#enviar").click(function(e){
        //         $("#texto-error").html("");
        //         $('input, select').css("border-color", "var(--bs-border-color)");

        //         e.preventDefault();

        //         if(!$('#id_rol').val()){
        //             $('#id_rol').focus();
        //             $("#texto-error").html("Debe elegir un rol.");
        //             $('#id_rol').css("border-color", "red");
        //         }else{
        //             var esValido = true;
        //             for(i=0; i < inputs.length; i++){
        //                 if(!validar(inputs[i])){
        //                 esValido = false; 
        //                 break;
        //                 }
        //             }
        //         }
                

        //         if(esValido){
        //             if(validarEmail($("#email").val())){
        //                 if(validarPassword( $("#password").val() ) ){
        //                         $("#crearuser").submit();
        //                 }else{
        //                     $("#texto-error").html("La contraseña no cumple con el formato correcto.");
        //                 } 
        //             }else{
        //                 $("#texto-error").html("El email no cumple con el formato correcto.");
        //             }
            
        //         }
        //     });

        //     function validarEmail(email){
        //         const expReg = /[a-zA-Z0-9]+@[a-zA-Z0-9]+[.][a-zA-Z]{2,5}/;
        //         return expReg.test(email);
        //     }

        //     function validarPassword(password){
        //         const expReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&_])[A-Za-z\d@.#$!%*?&_]{7,15}$/;
        //         return expReg.test(password);
        //     }

        //     function validar(campo){
        
        //         $("#texto-error").html("");
                
        //         if(campo.value.trim() === ""){
        //             campo.focus();
        //             $("#texto-error").html("El campo  " + campo.name + " no puede estar vacío");
        //             campo.style.borderColor = "#e70909";
        //             return false;
        //         }

        //         campo.style.borderColor = "white"; 
        //         return true;
        //     }
        // });
    </script>
    @endsection