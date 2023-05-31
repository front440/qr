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
           
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">Alumnos</div>
    <div class="card-body">

        <table id="table" class="table  table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Apellido 1</th>
                    <th scope="col">Apellido 2</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">DNI</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        let table = $('#table');

        table.DataTable({
            responsive: true,
            autoWidth: false,
            // traducción de DataTables
            language: {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_  registros por página",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first": "Primero",
                    "last": "Último"
                }
            },
            "ajax": "{{ route('user.get') }}",
            "columns": [{
                    data: "name"
                },
                {
                    data: "email"
                },
                {
                    data: "surname1"
                },
                {
                    data: "surname2"
                },
                {
                    data: "phone"
                },
                {
                    data: "cif"
                },
            
            ]
        });

    });
</script>

@stop