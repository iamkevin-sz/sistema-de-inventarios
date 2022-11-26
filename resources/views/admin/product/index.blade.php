@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.products.create')}}"> Agregar Productos </a>

        </div>
        <div class="card-body">
            <table id="data-tables" class="table table-striped">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
{{-- ruc ira en los detalles del proveedor --}}

                    @foreach ($products as $product )
                    <tr>
                        <td><a href="{{route('admin.products.show', $product)}}">{{$product ->id}}</td></a>
                        <td>{{$product ->name}}</td>
                        <td>{{$product ->stock}}</td>

                        @if ($product ->status == 'ACTIVE')
                        <td>
                            <a class="btn btn-success" href="{{route('admin.cambiar.estado.products', $product)}}">Activo &nbsp;<i class="fas fa-check"></i></a>
                        </td>
                        @else
                        <td>
                            <a class="btn btn-danger" href="{{route('admin.cambiar.estado.products', $product)}}">Desactivado &nbsp;<i class="fas fa-times"></i></a>
                        </td>
                        @endif


                        <td>{{$product ->category->name}}</td>



                        <td width="40px" style="display: inline-flex">
                            <a class="btn btn-secondary" href="{{route('admin.products.edit', $product)}}">Editar</a>&nbsp;&nbsp;&nbsp;


                            <form action="{{route('admin.products.destroy', $product)}}" method="POST">
                            @method('delete')
                            @csrf

                            <button class="btn btn-danger" type="submit">Eliminar</button>

                            </form>
                        </td>

                        {{-- {!! Form::open(['route' => 'admin.products.destroy']) !!} --}}
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



