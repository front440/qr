@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #DCDAD9 ;
    }


.qr-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 100px;
}

.qr-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.qr-image {
    margin-bottom: 20px;
}
</style>
<div class="content">
    <div class="qr-container">
        <h2 class="qr-title">STUDENT QR</h2>
        <div class="qr-image">
            {!! QrCode::size(400)->generate($datos) !!}
        </div>
    </div>
</div>
@stop