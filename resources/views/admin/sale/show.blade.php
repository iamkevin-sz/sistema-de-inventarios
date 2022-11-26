@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle de Venta</h1>
@stop

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>Cliente</strong></label>
                            <p><a href="{{route('admin.clients.show', $sale->client)}}">{{$sale->client->name}}</a></p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>Vendedor</strong></label>
                            <p>
                                {{-- <a href="{{route('admin.users.show',$sale->user)}}"> --}}
                                {{$sale->user->name}}
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>Número Venta</strong></label>
                            <p>{{$sale->id}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group">
                        <h4 class="card-title"><strong>Detalles de venta</strong></h4><br><br>
                        <div class="table-responsive col-md-12">
                            <table id="saleDetails" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio Venta (BO)</th>
                                        <th>Descuento(BO)</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal(BO)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($saleDetails as $saleDetail)
                                    <tr>
                                        <td>{{$saleDetail->product->name}}</td>
                                        <td>{{$saleDetail->price}}&nbsp;Bs</td>
                                        <td>{{$saleDetail->descount}} %</td>
                                        <td>{{$saleDetail->quantity}}</td>
                                        <td>{{number_format($saleDetail->quantity*$saleDetail->price - $saleDetail->quantity*$saleDetail->price*$saleDetail->descount/100,2)}}&nbsp;Bs
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>

                                    <tr>
                                        <th colspan="4">
                                            <p align="right">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($subtotal,2)}}&nbsp;Bs</p>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL IMPUESTO ({{$sale->tax}}%):</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($subtotal*$sale->tax/100,2)}}&nbsp;Bs</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($sale->total,2)}}&nbsp;Bs</p>
                                        </th>
                                    </tr>

                                </tfoot>

                            </table>
                        </div>
                    </div>




                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('admin.sales.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">


@stop

@section('js')
    <script>
    $('#data-tables').DataTable();
    </script>

@stop


