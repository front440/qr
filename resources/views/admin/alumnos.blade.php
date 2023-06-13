@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.FullCalendar', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')

<h1 class="text-center">TABLA DE ALUMNOS</h1>
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
                        <h5 class="modal-title" id="modalLabelEdit">Editar alumno</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end" style="color: #000000;">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname1" class="col-md-4 col-form-label text-md-end" style="color: #000000;">{{ __('Apellido 1') }}</label>

                            <div class="col-md-6">
                                <input id="surname1" type="text" class="form-control @error('surname1') is-invalid @enderror" name="surname1" value="{{ old('surname1') }}" required autocomplete="surname1" autofocus>

                                @error('surname1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname2" class="col-md-4 col-form-label text-md-end" style="color: #000000;">{{ __('Apellido 2') }}</label>

                            <div class="col-md-6">
                                <input id="surname2" type="text" class="form-control @error('surname2') is-invalid @enderror" name="surname2" value="{{ old('surname2') }}" required autocomplete="surname2" autofocus>

                                @error('surname2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="color: #000000;">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end" style="color: #000000;">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cif" class="col-md-4 col-form-label text-md-end" style="color: #000000;">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="cif" type="text" class="form-control @error('cif') is-invalid @enderror" name="cif" value="{{ old('cif') }}" required autocomplete="cif" autofocus>

                                @error('cif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="closeEdit">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="submitEditar">Guardar Cambios</button>
                    </div>
                        </div>

                       
                         
                        </div>

                     


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="closeEdit">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="submitEditar">Guardar Cambios</button>
                    </div>
                </div>
        </form>
    </div>
    </div>
    <!-- Modal Editar -->
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

    });
</script>

@stop