@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar  Productos</h1>
@stop

@section('content')

    <div class="card">

        {{-- {!! Form::open(['route' => 'admin.products.store', 'method' => 'POST', 'files' => true]) !!} --}}
        {!! Form::model($product, ['route' => ['admin.products.update', $product], 'method' => 'put', 'files' => true]) !!}
        <div class="card-body">

        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" name="name" id="name" value="{{$product->name }}" class="form-control"  aria-describedby="helpId" requerid>
        </div>

        <div class="form-group">
            <label for="sell_price">Precio de Venta (BS)</label>
            <input type="text" name="sell_price" id="sell_price" value="{{$product->sell_price }}" class="form-control"  aria-describedby="helpId" requerid>
        </div>

        <div class="form-group">
          <label for="category_id">Categoria</label>
          <select class="form-control" name="category_id" id="category_id">
           @foreach ($categories as $category)
               <option value="{{$category->id}}"
                @if ($category->id == $product->category_id)
                    selected
                @endif

                >{{$category->name}}</option>
           @endforeach
          </select>
        </div>

        <div class="form-group">
            <label for="provider_id">Proveedor</label>
            <select class="form-control" name="provider_id" id="provider_id">
             @foreach ($providers as $provider)
                 <option value="{{$provider->id}}"
                    @if ($provider->id == $product->provider_id)
                    selected
                    @endif
                >{{$provider->name}}</option>
             @endforeach
            </select>
          </div>

        <div class="mb-3">
        <label for="image" class="form-label">Imagen de Producto</label>
        <input class="form-control" type="file" id="picture" name="picture">
        </div>

        </div>
        <div class="d-grid gap-3 d-md-block">
            <button type="submit" class="btn btn-primary mr-2">Editar</button>
            <a href="{{route('admin.products.index')}}" class="btn btn-light mr-2">Cancelar</a>
        </div><br>
    {!! Form::close() !!}

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



