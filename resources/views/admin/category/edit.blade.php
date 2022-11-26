@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')

    <div class="card">

    {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}

        <div class="card-body">



            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name" placeholder="Nombre" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description"  id="description" rows="3">{{$category->description}} </textarea>
            </div>




        </div>

        <div class="d-grid gap-3 d-md-block">
            <button type="submit" class="btn btn-primary mr-2">Editar Categoria</button>
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



