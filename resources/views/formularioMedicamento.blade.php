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
                    @isset($medicamento)
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
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.querySelector('.form-validate');
            const textoError = document.getElementById('texto-error');

            form.addEventListener('submit', function(e) {
                e.preventDefault(); // detener envío hasta validar

                // Limpiar errores previos
                textoError.textContent = '';
                document.getElementById('nombre').style.borderColor = '';
                document.getElementById('dosis').style.borderColor = '';

                const nombre = document.getElementById('nombre').value.trim();
                const dosis = document.getElementById('dosis').value.trim();

                let error = '';

                if (!nombre) {
                    error = 'El nombre es obligatorio.';
                    document.getElementById('nombre').style.borderColor = 'red';
                    document.getElementById('nombre').focus();
                } else if (!dosis) {
                    error = 'La dosis es obligatoria.';
                    document.getElementById('dosis').style.borderColor = 'red';
                    document.getElementById('dosis').focus();
                }

                if (error) {
                    textoError.textContent = error;
                    return false;
                }

                form.submit(); // enviar si pasa validación
            });

        });
    </script>
    @endsection