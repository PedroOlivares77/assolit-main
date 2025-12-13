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
    document.getElementById('crearUser').addEventListener('submit', function(e) {
        e.preventDefault(); // Detener el envío hasta validar

        // Obtener valores
        const rol = document.getElementById('id_rol').value;
        const nombre = document.getElementById('name').value.trim();
        const apellidos = document.getElementById('apellidos').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        let error = '';

        // Limpiar bordes anteriores
        ['id_rol', 'name', 'apellidos', 'email', 'password'].forEach(id => {
            document.getElementById(id).style.borderColor = '';
        });

        // Validaciones
        if (!rol) {
            error = 'Debes seleccionar un rol.';
            document.getElementById('id_rol').style.borderColor = '#e70909';
        } else if (!nombre) {
            error = 'El nombre es obligatorio.';
            document.getElementById('name').style.borderColor = '#e70909';
        } else if (!apellidos) {
            error = 'Los apellidos son obligatorios.';
            document.getElementById('apellidos').style.borderColor = '#e70909';
        } else if (!email) {
            error = 'El email es obligatorio.';
            document.getElementById('email').style.borderColor = '#e70909';
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            error = 'Introduce un email válido.';
            document.getElementById('email').style.borderColor = '#e70909';
        } else if (!password) {
            error = 'La contraseña es obligatoria.';
            document.getElementById('password').style.borderColor = '#e70909';
        } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password)) {
            error = 'La contraseña debe tener al menos una minúscula, una mayúscula y un número.';
            document.getElementById('password').style.borderColor = '#e70909';
        }

        if (error) {
            document.getElementById('texto-error').innerText = error;
            return false;
        } else {
            document.getElementById('texto-error').innerText = '';
            this.submit(); // enviar formulario si todo es correcto
        }
    });
</script>
@endsection