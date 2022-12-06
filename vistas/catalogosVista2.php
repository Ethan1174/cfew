<?php
// session_start();
if (!isset($_SESSION)) {
    // echo '<script>alert("No tienes permitido navegar por URL"); window.location ="../."</script>';
    // die();
    session_start();
    $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
?>
<div class="container-respons">
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Modal para crear y actualizar subclase -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="modalAgregarSubClase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Subclase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" accept-charset="UTF-8" name="formSubClase" id="formSubClase" method="POST">
                        <table class="table table-condensed">
                            <tr>
                                <td align="right"><label class="control-label">ID SubClase: </span></td>
                                <td colspan="3"><input type="text" name="idSubClase" id="idSubClase" class="form-control input-sm" maxlength="6" required></input></td>
                            </tr>
                            <tr valign="baseline">
                                <td align="right"><label class="control-label">Descripción:</label></td>
                                <td colspan="3"><textarea rows="4" cols="40" name="desSubClase" id="desSubClase" class="form-control input-sm" required></textarea></td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="guardarCambiosSubclase">Registrar SubClase</button>
                            <input type="hidden" id="accion" name="accion" value="Agregar" />
                            <input type="hidden" id="idSubClase2" name="idSubClase2" value="" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Fin del modal para crear clases -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="container" id="clusterModClase1">
        <h2>Catálogo de Subclases</h1>
    </div>
    <br>
    <div class="container">
        <div id="toolbar">
            <button type="button" class="btn btn-success" id="botonAgregarSubClase" data-bs-toggle="modal" data-bs-target="#modalAgregarSubClase"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <button type="button" class="btn btn-primary dropdown-toggle" id="botonOpcionesSub" data-bs-toggle="dropdown" disabled><i class="bi bi-pencil-fill"></i> Opciones</button>
            <ul class="dropdown-menu">
                <li><button type="button" class="btn btn-primary dropdown-item" id="botonActualizarSubClase"><i class="bi bi-pencil-fill"></i> Editar</button></li>
                <li><button type="button" class="btn btn-danger dropdown-item" id="botonEliminarSubClase"><i class="bi bi-trash3"></i> Eliminar</button></li>
            </ul>
        </div>
        <table data-locale="es-MX" id="tablaSubClases" data-multiple-select-row="true" data-click-to-select="true" data-show-refresh="true" data-show-columns="true" data-toolbar="#toolbar" data-pagination="true" data-search="true" data-method="post" data-ajax="ajaxRequestSub" data-query-params="queryParams">
            <thead>
                <tr>
                    <!-- Data formatter se encuentra en main.js lín.83 -->
                    <th class="d-none" data-field="state" data-checkbox="true" data-print-ignore="true"></th>
                    <th data-field="id_subclase" data-sortable="true">ID Subclase</th>
                    <th data-field="descripcion" data-sortable="true">Descripcion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <br>
</div>
<script>
    // -----------------------------------------------------------------------------------------------------------------------------------
    // -----------------------------------------------------------Tabla Subclases---------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------------------------
    $(document).ready(function() {
        var $table = $('#tablaSubClases');
        var select = $('#botonOpcionesSub');
        $(function() {
            $table.bootstrapTable();
        });
        $(function() {
            $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
                select.prop('disabled', !$table.bootstrapTable('getSelections').length);
                // console.log(JSON.stringify($table.bootstrapTable('getSelections')));
            })
            select.click(function() {
                var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
                    auxIDSubC = row.id_subclase;
                    auxDesSubC = row.descripcion;
                    // console.log(auxIDSubC);
                    return row.id
                })

                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: ids
                })
                select.prop('disabled', true)
            });
        });

        // -------------------------------------------------------------------------------------------
        // -------------------------------------CRUD SubClases-----------------------------------------
        // -------------------------------------------------------------------------------------------

        $('#botonAgregarSubClase').click(function() {
            $('.modal-title').text('Agregar Subclase');
            $('#idSubClase').removeAttr('disabled');
            $('#formSubClase')[0].reset();
            $('#accion').val('Agregar');
            $('#guardarCambiosSubclase').text('Registrar Subclase');
        });
        $("#guardarCambiosSubclase").click(function() {
            operarSubClase();
        });
        $('#botonActualizarSubClase').click(function() {
            $('#modalAgregarSubClase').modal('show');
            $('.modal-title').text('Editar Subclase');
            $('#idSubClase').val(auxIDSubC).attr('disabled', 'disabled');
            $('#idSubClase2').val(auxIDSubC);
            $('#desSubClase').val(auxDesSubC);
            $('#guardarCambiosSubclase').text('Editar Subclase');
            $('#accion').val('Modificar');

        });
        $('#botonEliminarSubClase').click(function() {
            swal({
                title: "¿Estás seguro de eliminar la subclase " + auxIDSubC + " ?",
                text: "La subclase no se podrá recuperar una vez hecha esta operación.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    eliminarSubClase(auxIDSubC);
                } else {
                    swal(
                        'Sin cambios',
                        'No se realizó ninguna operación.',
                        'error'
                    )
                }
            });
        });

        // -------------------------------------------------------------------------------------------
        // -------------------------------funciones CRUD Modal SubClases----------------------------------------
        // -------------------------------------------------------------------------------------------

        function operarSubClase() {
            $('#formSubClase').off('submit').on('submit', function(event) {
                event.preventDefault();
                parametros = formToObject($("#formSubClase"));
                // console.log(parametros);
                $.ajax({
                    url: 'php/operacionesSubClase.php',
                    method: 'POST',
                    data: parametros,
                    success: function(data) {
                        // console.log(data);
                        if (data.success) {
                            swal(
                                    "La subclase fue operada con exito.", {
                                        icon: "success",
                                    }
                                )
                                .then(function() {
                                    $('#modalAgregarSubClase').modal('hide');
                                    $('#tablaSubClases').bootstrapTable('refresh');
                                });
                        } else {
                            swal(
                                    'Error de Operacion',
                                    'Hubo un error en la base de datos. ' + data.message,
                                    'error'
                                )
                                .then(function() {
                                    $('#modalAgregarSubClase').modal('hide');
                                });
                        }
                    }
                });
            });
        }

        function eliminarSubClase(id) {
            $.ajax({
                url: 'php/operacionesSubClase.php',
                method: 'POST',
                data: {
                    idSubClase: id,
                    accion: "Eliminar"
                },
                dataType: '',
                success: function(data) {
                    // console.log(data);
                    if (data.success) {
                        swal(
                                "La subclase fue eliminada con exito.", {
                                    icon: "success",
                                }
                            )
                            .then(function() {
                                $('#modalAgregarSubClase').modal('hide');
                                $('#tablaSubClases').bootstrapTable('refresh');
                            });
                    } else {
                        swal(
                                'Error de Operacion',
                                'Hubo un error en la base de datos. ' + data.message,
                                'error'
                            )
                            .then(function() {
                                $('#modalAgregarSubClase').modal('hide');
                            });
                    }
                }

            });

        }
    });

    function queryParams(params) {

        params.key = keySeguridad;
        console.log(params);
        return params;
    }

    function ajaxRequestSub(params) {
        // console.log(params);
        var url = 'php/Select_all_subclases.php';
        var data = jQuery.parseJSON(params.data);
        $.post(url, data).then(function(res) {
            console.log(res.data);
            if (res.success) {
                params.success(res.data);
            } else {
                params.error(res.message);
            }
        });
    }
</script>