    @extends('baseAdmin')
    @section('titulo', 'Usuarios')
    @section('info')
        <h1 class="titulo text-center">Usuarios</h1>
        <div class="tabla" >
            <div>
                <a href="{{route('crearUsuario')}}" class="btn btn-success botonInsertar">+ Crear</a>
            </div>
            <table class="tUsuario table table-striped table-hover" id="tUsuario">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Nombre Completo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Patologia</th>
                    <th>Vivienda</th>
                    <th>Medicamentos</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nombre}} {{$usuario->apellidos}}</td>
                        <td>{{$usuario->fecha_nacimiento}}</td>
                        <td>{{$usuario->patologia}}</td>
                        <td>{{$usuario->vivienda->nombre}}</td>
                        <td>
                            @foreach($usuario->medicamentos as $med)
                            <div>
                            {{ $med->nombre }} ({{ $med->dosis }}mg)
                            @if($med->pivot->desayuno) 
                                <span class="badge bg-success small">D</span>
                            @endif
                            @if($med->pivot->comida)   
                                <span class="badge bg-warning text-dark small">C</span>
                            @endif
                            @if($med->pivot->cena)
                                <span class="badge bg-primary small">N</span>
                            @endif
                            </div>
                            @endforeach
                        </td>
                        <td><a href="{{route('formularioUsuarioEd', $usuario->id)}}" class='btn btn-sm btn-warning'><i class='fa-regular fa-pen-to-square'></i> Editar</a></td>
                        <td>
                            <form action="{{route('eliminarUsuario', $usuario->id)}}" method="POST">
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
            var tabla = new DataTable('#tUsuario', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
            }});
        </script>
    @endsection    
