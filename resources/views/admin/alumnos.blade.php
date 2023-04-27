@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('plugins.FullCalendar', true);
@section('plugins.Sweetalert2', true);
@section('plugins.Datatables', true); --}}

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<table>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        <th>Teléfono</th>
        <th>CIF</th>
    </tr>
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
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> --}}

@stop
