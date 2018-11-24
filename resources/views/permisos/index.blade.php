

@extends('layouts.app')

@section('content')
    <div class="row   float-right ">
        <a class="btn btn-success" href="{{url('permisos/create')}}">Crear nuevo</a>
    </div>
    <div class="row mt-4">

        <div class="col-md-8 offset-md-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->name}}</td>
                            <td>
                                <button class="btn btn-info" onclick="detalles({{$permiso->id}})">Detalles</button>
                                <button class="btn btn-danger" onclick="deleteItem({{$permiso->id}})">Eliminar</button>                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form id="formDelete" action="" method="POST">
        @csrf
        @method('DELETE')
        <!--<input type="hidden" name="_method" value="DELETE">-->
        
    </form>
@endsection
@section('js')
    <script>
        
        function detalles (id) {
            window.location = "{{url('permisos')}}/" + id + '/edit';
        }
        function deleteItem (id) {
            let url = "{{url('permisos')}}";
            url += '/' + id;
            $('#formDelete').attr('action', url);
            $('#formDelete').submit();
        }
    </script>
@endsection