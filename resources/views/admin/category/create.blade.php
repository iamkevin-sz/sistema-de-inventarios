@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registro de Categoría</h1>
@stop

@section('content')

    <div class="card">

    {!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST']) !!}
        <div class="card-body">

            @include('admin.category._form')

        </div>

        <div class="d-grid gap-3 d-md-block">
            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
            <a href="{{route('admin.categories.index')}}" class="btn btn-light mr-2">Cancelar</a>
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



