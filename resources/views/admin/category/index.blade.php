@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.categories.create')}}"> Agregar Categorias </a>

        </div>
        <div class="card-body">
            <table id="data-tables" class="table table-striped">
                <thead align="center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody align="center">
                    @foreach ($categories as $category )


                    <tr>
                        <td>{{$category -> id}}</td>
                        <td>{{$category -> name}}</td>
                        <td>{{$category -> description}}</td>



                        <td width="10px" style="display: inline-flex">
                            <a class="btn btn-secondary" href="{{route('admin.categories.edit', $category)}}">Editar</a>&nbsp;&nbsp;&nbsp;

                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                            @method('delete')
                            @csrf

                            <button class="btn btn-danger" type="submit">Eliminar</button>

                            </form>
                        </td>

                        {{-- {!! Form::open(['route' => 'admin.categories.destroy']) !!} --}}
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



