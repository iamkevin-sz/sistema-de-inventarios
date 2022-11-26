@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Proveedores</h1>
@stop

@section('content')

    <div class="card">

        {!! Form::model($provider, ['route' => ['admin.providers.update', $provider], 'method' => 'put']) !!}
        <div class="card-body">


        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" value="{{$provider->name}}" name="name" id="name" aria-describedby="helpId" requerid>
        </div>

        <div class="form-group">
          <label for="email">Correo Electronico</label>
          <input type="email" class="form-control" value="{{$provider->email}}" name="email" id="email" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com" requerid>
        </div>

        <div class="form-group">
            <label for="ruc_number">Numero de Nit</label>
            <input type="number" class="form-control" value="{{$provider->ruc_number}}" name="ruc_number" id="ruc_number" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="address">Direccion</label>
            <input type="text" class="form-control" value="{{$provider->address}}" name="address" id="address" aria-describedby="emailHelpId"  requerid>
        </div>

        <div class="form-group">
            <label for="phone">Numero de Contacto</label>
            <input type="number" class="form-control" value="{{$provider->phone}}" name="phone" id="phone" aria-describedby="emailHelpId" requerid>
        </div>

        </div>

        <div class="d-grid gap-3 d-md-block">
            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
            <a href="{{route('admin.providers.index')}}" class="btn btn-light mr-2">Cancelar</a>
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



