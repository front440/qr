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
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>



                    {{-- @foreach ($registrosEntrada as $registro)
                        <tr>
                            <th scope="row">{{ $registro->fecha }}</th>
                            <td>{{ $registro->fecha }}</td>
                            <td>{{ $registro->type }}</td>
                            <td>{{ $registro->id_user }}</td>
                        </tr>
                    @endforeach --}}

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
