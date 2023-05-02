@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Input log</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            HOLA
        </div>
        <div class="card-body">
            HOLA


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>



                    @foreach ($registrosEntrada as $registro)
                        <tr>
                            <td>{{ DB::table('users')->find($registro->id_user)->name }}</td>
                            <td scope="row">{{ $registro->date }}</td>
                            <td> Entrada</td>
                            <td>
                                <i class="bi bi-pencil"></i>
                                <i class="bi bi-x-circle"></i>
                            </td>
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
        console.log('Hi!');
    </script>
@stop
