@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.FullCalendar', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')

<h1 class="text-center">TABLA DE ALUMNOS</h1>
@stop
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="background-color: #f7f7f7; text-align: center;">Nombre</th>
                                <th style="background-color: #f7f7f7; text-align: center;">Email</th>
                                <th style="background-color: #f7f7f7; text-align: center;">Apellido1</th>
                                <th style="background-color: #f7f7f7; text-align: center;">Apellido2</th>
                                <th style="background-color: #f7f7f7; text-align: center;">Teléfono</th>
                                <th style="background-color: #f7f7f7; text-align: center;">CIF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $alumno)
                                <tr>
                                    <td>{{$alumno->name}}</td>
                                    <td>{{$alumno->email}}</td>
                                    <td>{{$alumno->surname1}}</td>
                                    <td>{{$alumno->surname2}}</td>
                                    <td>{{$alumno->phone}}</td>
                                    <td>{{$alumno->cif}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')

<link rel="stylesheet" href="/css/admin_custom.css">
<style>
.table {
    font-size: 14px;
}
th {
    text-align: center;
    font-weight: bold;
}
td {
    vertical-align: middle;
    text-align: center;
}
</style>
@stop
@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
    integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
    crossorigin="anonymous"></script>
@stop