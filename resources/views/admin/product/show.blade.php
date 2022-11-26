@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')

<div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">

                                <h3>{{$product->name}}</h3>
                                <div class="d-flex justify-content-between" style="text-align: center;">
                                        <img src="{{asset('image/'.$product->image)}}" alt="profile" class="img-lg rounded-circle mb-3" >
                                </div>
                            </div>
                            {{-- <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        Sobre proveedor
                                    </button>
                                    <button type="button"
                                        class="list-group-item list-group-item-action">Productos</button>

                                    <button type="button" class="list-group-item list-group-item-action">Registrar
                                        producto</button>
                                </div>
                            </div> --}}

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$product->status}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                            Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        {{--Productos por categoria--}}

                                        <a href="{{route('admin.providers.show', $product->provider->id)}}">
                                        {{$product->provider->name}}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                            Categoría
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">
                                            {{$product->category->name}}
                                        </a>
                                    </span>
                                </p>
                            </div>

                            @if ($product->status == 'ACTIVE')

                            <button class="btn btn-success btn-block">{{$product->status}}</button>

                            @else

                            <button class="btn btn-warning btn-block">{{$product->status}}</button>

                            @endif
                        </div>


                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de proveedor</h4>
                                </div>
                            </div>

                            {{-- 'code',         //el codigo se generara en el controlador
                            'name',
                            'stock',
                            'image',
                            'sell_price',
                            'status',
                            'category_id',
                            'provider_id', --}}

                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">



                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Código</strong>
                                        <p class="text-muted">
                                            {{$product->code}}
                                        </p>
                                        <hr>

                                        <strong><i class="fab fa-product-hunt mr-1"></i> Stock</strong>
                                        <p class="text-muted">
                                            {{$product->stock}}
                                        </p>
                                        <hr>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Precio de Venta</strong>
                                        <p class="text-muted">
                                            {{$product->sell_price}}&nbsp;Bs
                                        </p>
                                        <hr>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('admin.products.index')}}" class="btn btn-primary float-right">Regresar</a>
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



