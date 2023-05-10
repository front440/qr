@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Input log</h1>
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

    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            Registros de entrada
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
        $(document).ready(function() {
            // $('#table').DataTable({
            //     responsive: true,
            //     autoWidth: false,
            //     // traducción de DataTables
            //     language: {
            //         "search": "Buscar",
            //         "lengthMenu": "Mostrar _MENU_  registros por página",
            //         "info": "Mostrando página _PAGE_ de _PAGES_",
            //         "paginate": {
            //             "previous": "Anterior",
            //             "next": "Siguiente",
            //             "first": "Primero",
            //             "last": "Último"
            //         }
            //     }
            // });


            

            table = $('#table').DataTable({
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
                "ajax": "{{ route('entrada.get') }}",
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
                                return 'Entrada';
                            } else {
                                return 'Salida';
                            }
                        }
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return '<button data-id="${row.id}" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" id="edit"><i class="fa fa-edit"></i></button>' +
                                '<button data-id="${row.id}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></button>';
                        }
                    },

                ]
            });

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
                        table.ajax.reload();
                    }
                });
            });


        });
    </script>
@stop
