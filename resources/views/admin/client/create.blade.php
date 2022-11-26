@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registro de Clientes</h1>
@stop

@section('content')

    <div class="card">

        {!! Form::open(['route' => 'admin.clients.store', 'method' => 'POST']) !!}
        <div class="card-body">


            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text"
                class="form-control" name="name" id="name" aria-describedby="helpId" requerid>
            </div>

            <div class="form-group">
                <label for="dni">CI (8)</label>
                <input type="number"
                  class="form-control" name="dni" id="dni" aria-describedby="helpId" requerid>
            </div>

            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text"
                  class="form-control" name="address" id="address" aria-describedby="helpId" >
                 <small id="helpId" class="form-text text-muted">Este Campo es Opcional</small>

            </div>

            <div class="form-group">
                <label for="phone">Telefono / Celular (9)</label>
                <input type="text"
                  class="form-control" name="phone" id="phone" aria-describedby="helpId" >
                 <small id="helpId" class="form-text text-muted">Este Campo es Opcional</small>

            </div>

            <div class="form-group">
                <label for="email">Correo Electronico</label>
                <input type="text"
                  class="form-control" name="email" id="email" aria-describedby="helpId" >
                  <small id="helpId" class="form-text text-muted">Este Campo es Opcional</small>
            </div>



        </div>
        <div class="d-grid gap-3 d-md-block">
            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
            <a href="{{route('admin.clients.index')}}" class="btn btn-light mr-2">Cancelar</a>
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



