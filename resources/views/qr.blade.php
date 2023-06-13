@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('plugins.FullCalendar', true);
@section('plugins.Sweetalert2', true);
@section('plugins.Datatables', true); --}}

@section('content_header')
    <h1>Qr</h1>
@stop
@section('css')


@section('content')
    <div class="card-body">

    <link rel="stylesheet" href="/css/admin_custom.css">
        {!! QrCode::size(400)->generate($datos) !!}
    </div>
@stop