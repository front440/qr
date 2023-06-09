@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="text-center">Alumnos</h1>
@stop

@section('content')

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalLabelEdit" aria-hidden="true">
        <form action="" id="formEdit">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <input type="hidden" name="id" id="idUser">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelEdit">Editar alumno</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname1" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Apellido 1') }}</label>

                            <div class="col-md-6">
                                <input id="surname1" type="text"
                                    class="form-control @error('surname1') is-invalid @enderror" name="surname1"
                                    value="{{ old('surname1') }}" required autocomplete="surname1" autofocus>

                                @error('surname1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surname2" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Apellido 2') }}</label>

                            <div class="col-md-6">
                                <input id="surname2" type="text"
                                    class="form-control @error('surname2') is-invalid @enderror" name="surname2"
                                    value="{{ old('surname2') }}" required autocomplete="surname2" autofocus>

                                @error('surname2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cif" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="cif" type="text" class="form-control @error('cif') is-invalid @enderror"
                                    name="cif" value="{{ old('cif') }}" required autocomplete="cif" autofocus
                                    disabled>

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

    </div>
    </div>
    </div>
    </form>
    <!-- Modal Editar -->

    <!-- Modal PAss -->
    <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="modalLabelEdit"
        aria-hidden="true">
        <form action="" id="formPass">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <input type="hidden" name="id" id="idUserPass">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelEdit">Cambiar contraseña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="namePass" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus disabled>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" required autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password1" class="col-md-4 col-form-label text-md-end"
                                style="color: #000000;">{{ __('Repite Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password1" type="password"
                                    class="form-control @error('password1') is-invalid @enderror" name="password1"
                                    value="{{ old('password1') }}" required autocomplete="password1" autofocus>

                                @error('password1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                id="closePass">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="submitPass">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal PAss -->

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

@stop
@section('js')


    <script>
        $(document).ready(function() {

            let table = $('#table');

            //Datatable
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
                                '" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-edit"></i></button><button class="btn btn-info edit" data-id="' +
                                row.id +
                                '" data-toggle="modal" data-target="#modalPass"><i class="fa fa-user"></i></button>';
                        }
                    },

                ]
            });
            // End Datatable

            // Edit
            $(document).on('click', '.edit', function() {
                // let id = $(this).data('id');
                idUser = $(this).data('id');
                document.getElementById("idUser").value = idUser;
                $.ajax({
                    url: "{{ route('usuario.edit') }}",
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
                        $("idUser").value = $(this).data('id');
                        document.getElementById('idUserPass').value = usuarioRespuesta.id;

                        $('#name').val(usuarioRespuesta.name);
                        $('#namePass').val(usuarioRespuesta.name);
                        $('#surname1').val(usuarioRespuesta.surname1);
                        $('#surname2').val(usuarioRespuesta.surname2);
                        $('#email').val(usuarioRespuesta.email);
                        $('#email').val(usuarioRespuesta.email);
                        $('#cif').val(usuarioRespuesta.cif);
                        $('#phone').val(usuarioRespuesta.phone);

                    }
                });
            });
            // End Edit

            // Save Edit Input
            $('#submitEditar').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('usuario.update') }}",
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

            // Save new pass
            $('#submitPass').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('user.changepass') }}",
                    type: "post",
                    dataType: "json",
                    data: $("#formPass").serialize(),
                    success: function(response) {
                        $("#formPass")[0].reset();
                        console.log(response);
                        $("#closePass").click();
                        table.DataTable().ajax.reload();
                    }
                });
            });
            // End new pass

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
                            url: "{{ route('usuario.delete') }}",
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
        });
    </script>

@stop
