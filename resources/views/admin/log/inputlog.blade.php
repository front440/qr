@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Registro</h1>
@stop

@section('content')

    <!-- Modal Añadir -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="" id="MyForm">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir entrada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="usuario">Usuario</label>
                                <select class="form-control" id="usuario" name="usuario">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="tipo">tipo</label>
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="0" selected>Salida</option>
                                    <option value="1">Entrada</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="fecha">fecha </label>
                                <input type="datetime-local" class="form-control" placeholder="Color texto" id="fecha"
                                    name="fecha" value="">
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="submit">Guardar Cambios</button>
                    </div>
                </div>
        </form>
    </div>
    </div>
    <!-- Modal Añadir -->

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalLabelEdit"
        aria-hidden="true">
        <form action="" id="formEdit">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <input type="hidden" name="id" id="idInputLog">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelEdit">Editar entrada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="usuario">Usuario</label>
                                <select class="form-control" id="usuarioEditar" name="usuario">

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="tipo">tipo</label>
                                <select class="form-control" name="tipo" id="tipoEditar">
                                    <option value="0" selected>Salida</option>
                                    <option value="1">Entrada</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="fecha">fecha </label>
                                <input type="datetime-local" class="form-control" placeholder="Color texto" id="fechaEditar"
                                    name="fecha" value="">
                            </div>
                        </div>


                    </div>

                </div>
        </form>
    </div>
    </div>
    <!-- Modal Editar -->

    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            Registros
        </div>
        <div class="card-body">
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Añadir</button>


            <table id="table" class="table  table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acción</th>
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
@stop

@section('js')

    <script>
        $(document).ready(function() {

            table = $('#table');
            usuarios = @json($usuarios); // La variable users contiene todos los usuarios
            // setInterval(() => {
            //     table.DataTable().ajax.reload();
            // }, 3000);

            // Save Input
            $('#submit').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('entrada.store') }}",
                    type: "post",
                    dataType: "json",
                    data: $("#MyForm").serialize(),
                    success: function(response) {
                        $("#MyForm")[0].reset();
                        console.log(response);
                        $("#close").click();
                        table.DataTable().ajax.reload();
                    }
                });
            });
            // End Save Input

            // Datatable
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
                "ajax": "{{ route('salida.get') }}",
                "columns": [{
                        data: "id"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "date"
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            if (row.type == 0) {
                                return 'Salida';
                            } else {
                                return 'Entrada';
                            }
                        }
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return '<button id="delete" class="btn btn-danger delete" data-id="' +
                                row.id +
                                '"><i class="fa fa-trash"></i></button>' +
                                '<button class="btn btn-info edit" data-id="' + row.id +
                                '" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i></button>';
                        }
                    },

                ]
            });
            // End Datatable

            // Edit
            $(document).on('click', '.edit', function() {
                // let id = $(this).data('id');
                idInputLog = $(this).data('id');
                document.getElementById("idInputLog").value = idInputLog;
                $.ajax({
                    url: "{{ route('entrada.edit') }}",
                    type: "post",
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $(this).data('id')
                    },
                    success: function(response) {
                        // $("#modalEdit")[0].reset();
                        console.log(response);
                        usuarioRespuesta = response.data;
                        // $("#close").click();
                        $("idInputLog").value = $(this).data('id');

                        // seleccionamos el usuario
                        for (usuario of usuarios) {
                            if (response.data.id_user == usuario.id) {
                                $('#usuarioEditar').append('<option value="' + usuario.id +
                                    '" selected>' + usuario.name + '</option>');
                            } else {
                                $('#usuarioEditar').append('<option value="' + usuario.id +
                                    '">' + usuario.name + '</option>');
                            }
                        };

                        // Seleccionamos el tipo de entrada
                        usuarioRespuesta.type ? $('#tipoEditar option')[0].selected = false : $(
                            '#tipoEditar option')[0].selected = true;
                        // $('#tipoEditar')

                        // Seleccionamos fecha
                        // $('#fechaEditar').text(usuarioRespuesta.date);
                        document.getElementById("fechaEditar").value = usuarioRespuesta.date;
                        // table.ajax.reload();
                    }
                });
            });
            // End Edit

            // Save Edit Input
            $('#submitEditar').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('entrada.update') }}",
                    type: "post",
                    dataType: "json",
                    data: $("#formEdit").serialize(),
                    success: function(response) {
                        $("#formEdit")[0].reset();
                        console.log(response);
                        $("#closeEdit").click();
                        table.DataTable().ajax.reload();
                    }
                });
            });
            // End Save Edit Input

            // Delete Log
            $(document).on('click', '#delete', function() {

                Swal.fire({
                    title: '¿Quieres borrar los cambios?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Borrar',
                    denyButtonText: `No borrar`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('Borrado!', '', 'success');

                        console.log($(this).data('id'));

                        $.ajax({
                            url: "{{ route('entrada.delete') }}",
                            type: "post",
                            dataType: "json",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": $(this).data('id')
                            },
                            success: function(response) {

                                table.DataTable().ajax.reload();
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Los cambios no han sido guardados', '', 'info');
                    }
                })
            })
            // End Delete Log


        }); // ready
    </script>

@stop