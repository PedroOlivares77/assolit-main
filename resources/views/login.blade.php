@extends('baseUsuario')
@section('título', 'Login')
@section('contenido')

    <h3 class="titulo mt-5 text-center">Iniciar sesión</h3>
    <div class="row justify-content-center">
        <div class="col-md-4 bg-white p-4 rounded shadow m-4 mb-5">
            <form action="{{route('login')}}" method="post" name="login" id="login">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="ejemplo@dominio.com">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <div class="mb-3">
                    ¿No tienes cuenta? <a href="{{route('formularioRegistro')}}" class="link link-success">Regístrate</a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button class="btn btn-primary my-3" type="submit" id="enviar">Iniciar sesión</button>
                </div>
            </form>
            <div id="texto-error" class="text-danger text-center">
            </div>
        </div>
    </div>   
    
@endsection