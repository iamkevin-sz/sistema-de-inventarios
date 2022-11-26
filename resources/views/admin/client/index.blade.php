@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.clients.create')}}"> Agregar Clientes </a>

        </div>
        <div class="card-body">
            <table id="data-tables" class="table table-striped">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>CI</th>
                        <th>Telefono / Celular</th>
                        <th>Correo Electronico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
{{-- ruc ira en los detalles del proveedor --}}

                    @foreach ($clients as $client )
                    <tr>
                        <td><a href="{{route('admin.clients.show', $client)}}">{{$client ->id}}</td></a>
                        <td>{{$client ->name}}</td>
                        <td>{{$client ->dni}}</td>
                        <td>{{$client ->phone}}</td>
                        <td>{{$client ->email}}</td>



                        <td width="10px" style="display: inline-flex">
                            <a class="btn btn-secondary" href="{{route('admin.clients.edit', $client)}}">Editar</a>&nbsp;&nbsp;&nbsp;

                            <form action="{{route('admin.clients.destroy', $client)}}" method="POST">
                            @method('delete')
                            @csrf

                            <button class="btn btn-danger" type="submit">Eliminar</button>

                            </form>
                        </td>

                        {{-- {!! Form::open(['route' => 'admin.clients.destroy']) !!} --}}
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $('#data-tables').DataTable({
        "language": {
            "search":       "Buscar",
            "lengthMenu":   "Mostrar _MENU_ registros por página",
            "info":         "Mostrando página _PAGE_ de _PAGES_",
            "zeroRecords": 'No se encontró lo que buscas',
            "infoEmpty": '0 resultados',
            "infoFiltered": '(Filtrado de _MAX_ registros totales)',
            "paginate": {

                            "previous": "Anterior",
                            "next": "Siguiente",
                            "first": "Primero",
                            "last": "Último"
            }
        }
    });
    </script>
@stop



