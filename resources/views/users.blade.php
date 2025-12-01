@extends('baseAdmin')
    @section('titulo', 'Users')
    @section('info')
        <h1 class="titulo text-center">Users</h1>
        <div class="tabla" >
            <div>
                <a href="{{route('crearUser')}}" class="btn btn-success botonInsertar">+ Crear</a>
            </div>
            <table class="tUser table table-striped table-hover" id="tUser">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->rol->tipo}}</td>
                        <td>{{$user->nombre}} {{$user->apellidos}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('formularioUsersEd', $user->id)}}" class='btn btn-sm btn-warning'><i class='fa-regular fa-pen-to-square'></i> Editar</a></td>
                        <td>
                            <form action="{{route('eliminarUser', $user->id)}}" method="POST">
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
            var tabla = new DataTable('#tUser', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
            }});
        </script>
    @endsection    
</div>