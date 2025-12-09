    @extends('baseAdmin')
    @section('titulo', 'Medicamentos')
    @section('info')
        <h1 class="titulo text-center">Medicamentos</h1>
        <div class="tabla" >
            <div>
                <a href="{{route('crearMedicamento')}}" class="btn btn-success botonInsertar">Crear</a>
            </div>
            <table class="tMedicamento table table-striped table-hover" id="tMedicamento">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Medicamento</th>
                    <th>Dosis</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($medicamentos as $medicamento)
                    <tr>
                        <td>{{$medicamento->id}}</td>
                        <td>{{$medicamento->nombre}}</td>
                        <td>{{$medicamento->dosis}} mg</td>
                        <td><a href="{{route('formularioMedicamentoEd', $medicamento->id)}}" class='btn btn-sm btn-warning'><i class='fa-regular fa-pen-to-square'></i> Editar</a></td>
                        <td>
                            <form action="{{route('eliminarMedicamento', $medicamento->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class='fa-solid fa-trash'></i>
                                     Eliminar
                                </button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            var tabla = new DataTable('#tmedicamento', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
            }});
        </script>
    @endsection    
</div>