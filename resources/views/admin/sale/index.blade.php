@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Ventas</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.sales.create')}}"> Agregar Venta </a>
        </div>

        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead  align="center">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody align="center">


                    @foreach ($sales as $sale )


                    <tr>
                        <td>{{$sale -> id}}</td>
                        <td>{{$sale -> sale_date}}</td>
                        <td>{{$sale -> total}}</td>

                        @if ($sale->status == 'VALID')
                        <td>
                            <a class="btn btn-success" href="{{route('admin.cambiar.estado.sales', $sale)}}">Activo &nbsp;<i class="fas fa-check"></i></a>
                        </td>
                        @else
                        <td>
                            <a class="btn btn-danger" href="{{route('admin.cambiar.estado.sales', $sale)}}">Desactivado &nbsp;<i class="fas fa-times"></i></a>
                        </td>
                        @endif


                        <td width="5px" style="display: inline">
                            <a href="{{route('admin.sales.pdf', $sale)}}" class="btn btn-secondary" ><i class="fa fa-file-pdf"></i></a>
                            <a href="#" class="btn btn-primary"><i class="fa fa-print"></i></a>
                            <a href="{{route('admin.sales.show', $sale)}}" class="btn btn-warning" style="color:white"><i class="fa fa-eye"></i></a>
                        </td>




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
    $('#example').DataTable({
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



