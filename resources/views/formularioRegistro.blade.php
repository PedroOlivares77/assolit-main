 @extends('baseUsuario')
    @section('titulo', 'Registrarse')
    @section('contenido')
    <h3 class="titulo mt-5 text-center">Registrarse</h3>
        <div class="row justify-content-center">
            <div class="col-md-4 bg-white p-4 rounded shadow m-4 mb-5">
                <form action="{{route('registro')}}" method="post" class="form-validate" id="registro">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">
                            Contraseña
                        </label>
                        <input class="form-control" type="password" name="password" id="password">
                        <div class="form-text form-secondary m-2 info-texto-password">La contraseña debe tener al menos una minúscula, una mayúscula, un número.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="rePassword">Repetir contraseña</label>
                        <input class="form-control" type="password" name="rePassword" id="rePassword">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="apellidos">Apellidos</label>
                        <input class="form-control" type="text" name="apellidos" id="apellidos">
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button class="btn btn-success my-3 w-50" type="submit" id="enviar">Registrarse</button>
                        
                    </div>
                </form>
                <div id="texto-error" class="text-center text-danger"></div>
            </div>
        </div>
    @endsection