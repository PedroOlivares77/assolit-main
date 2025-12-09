@extends('baseUsuario')
@section('titulo', 'Registrarse')
@section('contenido')
<h3 class="titulo mt-5 text-center">Registrarse</h3>
<div class="row justify-content-center">
    <div class="col-md-4 bg-white p-4 rounded shadow m-4 mb-5">
        <form action="{{route('registro')}}" method="post" id="registro">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password">
                <div class="form-text form-secondary m-2 info-texto-password">
                    La contraseña debe tener al menos una minúscula, una mayúscula y un número.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="rePassword">Repetir contraseña</label>
                <input class="form-control" type="password" name="rePassword" id="rePassword">
            </div>

            <div class="mb-3">
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre">
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

<script>
document.getElementById('registro').addEventListener('submit', function(e){
    e.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const rePassword = document.getElementById('rePassword').value;
    const nombre = document.getElementById('nombre').value.trim();
    const apellidos = document.getElementById('apellidos').value.trim();
    let error = '';

    // Campos vacíos
    if(!email || !password || !rePassword || !nombre || !apellidos){
        error = 'Todos los campos son obligatorios.';
    }
    // Email válido
    else if(!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)){
        error = 'Por favor, introduce un email válido.';
    }
    // Contraseña con minúscula, mayúscula y número
    else if(!/(?=.*[a-z])/.test(password) || !/(?=.*[A-Z])/.test(password) || !/(?=.*\d)/.test(password)){
        error = 'La contraseña debe tener al menos una minúscula, una mayúscula y un número.';
    }
    // Contraseñas coinciden
    else if(password !== rePassword){
        error = 'Las contraseñas no coinciden.';
    }

    const errorDiv = document.getElementById('texto-error');
    if(error){
        errorDiv.innerText = error;
    } else {
        errorDiv.innerText = '';
        this.submit();
    }
});
</script>
@endsection