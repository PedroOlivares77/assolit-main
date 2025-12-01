<div>
    @extends('baseUsuario')
    @section('titulo', 'noPermitido')
    @section('contenido')
    <div class="container mt-5" id="noPermitido">
        <h3 class="titulo m-3 text-center p-2">No tiene acceso a esta página</h3>
        <div class="row h-100">
            <div class="d-flex justify-content-center">
                <a href="{{route('index')}}">
                    <button type="button" class="btn btn-primary m-5">Volver a inicio</button>
                </a>
            </div>
        </div> 
    </div>
        
    @endsection
</div>