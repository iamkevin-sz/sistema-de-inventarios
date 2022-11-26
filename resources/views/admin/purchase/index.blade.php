@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Compras</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

            <a href="{{route('admin.purchases.create')}}"> Agregar Compra </a>

        </div>
        <div class="card-body">
            <table id="data-tables" class="table table-striped" style="width:100%">
                <thead align="center">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                {{-- 'provider_id',
                'user_id',
                'purchase_date',
                'tax',
                'total',
                'status',
                'picture', --}}
                <tbody align="center">
                    @foreach ($purchases as $purchase )


                    <tr>
                        <td>{{$purchase -> id}}</td>
                        <td>{{$purchase -> purchase_date}}</td>
                        <td>{{$purchase -> total}}</td>

                        @if ($purchase->status == 'VALID')
                        <td>
                            <a class="btn btn-success" href="{{route('admin.cambiar.estado.purchases', $purchase)}}">Activo &nbsp;<i class="fas fa-check"></i></a>
                        </td>
                        @else
                        <td>
                            <a class="btn btn-danger" href="{{route('admin.cambiar.estado.purchases', $purchase)}}">Desactivado &nbsp;<i class="fas fa-times"></i></a>
                        </td>
                        @endif


                        {{-- <td width="5px">
                            <a class="btn btn-secondary" href="{{route('admin.purchases.edit', $purchase)}}"><i class="far fa-edit"></i></a>
                        </td>no se puede editar porque la compra ya esta hecha --}}

                        {{-- <td width="5px">
                            <form action="{{route('admin.purchases.destroy', $purchase)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td> --}}

                        <td width="10px" style="display: inline">
                            <a href="{{route('admin.purchases.pdf', $purchase)}}" class="btn btn-secondary" ><i class="fa fa-file-pdf"></i></a>
                            <a href="#" class="btn btn-primary"><i class="fa fa-print"></i></a>
                            <a href="{{route('admin.purchases.show', $purchase)}}" class="btn btn-warning" style="color:white"><i class="fa fa-eye"></i></a>
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



