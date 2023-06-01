@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('plugins.FullCalendar', true);
@section('plugins.Sweetalert2', true);
@section('plugins.Datatables', true); --}}

@section('content_header')
    <h1>Qr</h1>
@stop

@section('content')
<div class="card-header">
                <h2>QR</h2>
            </div>
            <div class="card-body">
                {!! Qr::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9') !!}
            </div>
        </div>
    </div>    </div>
@stop