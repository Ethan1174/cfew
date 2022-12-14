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
    <!-- Modal para crear clase -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="modalAgregarClase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Agregar Clase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" accept-charset="UTF-8" name="formClaseA" id="formClaseA" method="POST">
                        <table class="table table-condensed">
                            <tr>
                                <td align="right"><label class="control-label">ID Clase: </span></td>
                                <td colspan="3"><input type="text" name="idClase" id="idClase" class="form-control input-sm" maxlength="6" required></input></td>
                            </tr>
                            <!-- <tr valign="baseline">
                                <td align="right"><label class="control-label">Subclase:</label></td>
                                <td colspan="3" ><input type="text" name="subclaseRef" id="subclaseRef" class="form-control input-sm" maxlength="12"></input></td>
                            </tr> -->
                            <tr valign="baseline">
                                <td align="left"><label class="control-label">Subclase</label></td>
                                <td>
                                    <div id="multipleSelect" placeholder="Subclase" data-silent-initial-value-set="true"></div>
                                </td>
                            </tr>

                            <tr valign="baseline">
                                <td align="right"><label class="control-label">Descripci??n:</label></td>
                                <td colspan="3"><textarea rows="4" cols="40" name="desClase" id="desClase" class="form-control input-sm" required></textarea></td>
                            </tr>
                        </table>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="guardarCambiosClaseA">Registrar Clase</button>
                            <input type="hidden" id="accion" name="accion" value="" />
                            <input type="hidden" id="idClase2" name="idClase2" value="" />
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
        <h2>Cat??logo de Clases</h1>
    </div>
    <br>
    <div class="container">

        <div id="toolbar">
            <button type="button" class="btn btn-success" id="botonAgregarClase" data-bs-toggle="modal" data-bs-target="#modalAgregarClase"><i class="bi bi-plus-circle-fill"></i> Agregar</button>

            <button type="button" class="btn btn-primary dropdown-toggle" id="botonOpcionesCla" data-bs-toggle="dropdown" disabled> <i class="bi bi-pencil-fill"></i> Opciones</button>
            <ul class="dropdown-menu">
                <li><button type="button" class="btn btn-primary dropdown-item" id="botonActualizarClase"><i class="bi bi-pencil-fill"></i> Editar</button></li>
                <li><button type="button" class="btn btn-danger dropdown-item" id="botonEliminarClase"><i class="bi bi-trash3"></i> Eliminar</button></li>
            </ul>
        </div>
        <table data-locale="es-MX" id="tablaClases" data-multiple-select-row="true" data-click-to-select="true" data-show-refresh="true" data-show-columns="true" data-toolbar="#toolbar" data-pagination="true" data-search="true" data-method="post" data-query-params="queryParams" data-ajax="ajaxRequestCl" data-query-params="queryParams">
            <thead>
                <tr>
                    <!-- Data formatter se encuentra en main.js l??n.83 -->
                    <th class="d-none" data-field="state" data-checkbox="true" data-print-ignore="true"></th>
                    <th data-field="id_clase" data-sortable="true">ID Clase</th>
                    <th data-field="descripcion" data-sortable="true">Descripcion</th>
                    <th data-field="subclase" data-sortable="true">Subclase</th>
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
    // -----------------------------------------------------------Tabla Clases------------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------------------------
    $(document).ready(function() {
        var $table = $('#tablaClases');
        var select = $('#botonOpcionesCla');
        // -----------------------------------------------------------------------------------------------------------------------------------
        // -----------------------------------------------------------Dise??o Print------------------------------------------------------------
        // -----------------------------------------------------------------------------------------------------------------------------------
        $(function() {
            console.log(dataUser);
            $table.bootstrapTable();

        });
        getAllSubclasesById();

        // ------------------------------------------------------------------------------------------------------------------------------------
        // ----------------------------------------FUNCION select Row BootstrapTable para Editar o eliminar---------------------------------
        // ---------------------------------------------------------------------------------------------------------------------------------


        $(function() {

            $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
                select.prop('disabled', !$table.bootstrapTable('getSelections').length);
                // console.log(JSON.stringify($table.bootstrapTable('getSelections')));
            })
            select.mouseenter(function() {
                var ids = $.map($table.bootstrapTable('getSelections'), function(row) {

                    auxClases = row;
                    // console.log(auxClases);
                    return row.id
                })
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: ids
                })
            });
            select.prop('disabled', true)
        });
        // -------------------------------------------------------------------------------------------
        // -------------------------------CRUD Modal Clases----------------------------------------
        // -------------------------------------------------------------------------------------------
        $('#botonAgregarClase').click(function() {
            $('.modal-title').text('Agregar Clase');
            $('#idClase').removeAttr('disabled');
            $('#formClaseA')[0].reset();
            $('#accion').val('Agregar');
            $('#guardarCambiosClaseA').text('Registrar Clase');
        });

        $('#botonActualizarClase').click(function() {
            $('#modalAgregarClase').modal('show');
            $('.modal-title').text('Editar Clase');
            $('#idClase').val(auxClases.id_clase).attr('disabled', 'disabled');
            $('#idClase2').val(auxClases.id_clase);
            $('#desClase').val(auxClases.descripcion);
            $('#guardarCambiosClaseA').text('Editar Clase');
            $('#accion').val('Modificar');
            $("#multipleSelect").val(auxClases.subclase)
            let sub = auxClases.subclase.split('|');
            document.querySelector('#multipleSelect').setValue(sub);
            // multiselectClases(auxClases.subclase);
        });

        $('#botonEliminarClase').click(function() {
            swal({
                title: "??Est??s seguro de eliminar la clase " + auxClases.id_clase + " ?",
                text: "La clase no se podr?? recuperar una vez hecha esta operaci??n.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    eliminarClase(auxClases.id_clase);
                } else {
                    swal(
                        'Sin cambios',
                        'No se realiz?? ninguna operaci??n.',
                        'error'
                    )
                }
            });
        });
        // -------------------------------------------------------------------------------------------
        // -------------------------------FUNCIONES CRUD Modal Clases----------------------------------------
        // -------------------------------------------------------------------------------------------
        $("#guardarCambiosClaseA").click(function() {
            operarClase();
        });

        function operarClase() {
            $('#formClaseA').off('submit').on('submit', function(event) {
                // console.log("iter");
                event.preventDefault();
                parametros = formToObject($("#formClaseA"));
                parametros.subclases = $('#multipleSelect').val().join("|");
                // console.log(parametros);
                $.ajax({
                    url: 'php/operacionesClase.php',
                    method: 'POST',
                    data: parametros,
                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            swal(
                                    "La clase fue operada con exito.", {
                                        icon: "success",
                                    }
                                )
                                .then(function() {
                                    $('#modalAgregarClase').modal('hide');
                                    $('#tablaClases').bootstrapTable('refresh');
                                });
                        } else {
                            swal(
                                    'Error de Operacion',
                                    data.message,
                                    'error'
                                )
                                .then(function() {

                                    $('#tablaClases').bootstrapTable('refresh');
                                });
                        }
                    }
                });
            });

        }



        function eliminarClase(id) {
            $.ajax({
                url: 'php/operacionesClase.php',
                method: 'POST',
                data: {
                    idClase: id,
                    accion: "Eliminar"
                },
                dataType: '',
                success: function(data) {
                    // console.log(data);
                    if (data.success) {
                        swal(
                                "La clase fue eliminada con exito.", {
                                    icon: "success",
                                }
                            )
                            .then(function() {
                                $('#modalAgregarClase').modal('hide');
                                $('#tablaClases').bootstrapTable('refresh');
                            });
                    } else {
                        swal(
                                'Error de Operacion',
                                'Hubo un error en la base de datos. ' + data.message,
                                'error'
                            )
                            .then(function() {
                                $('#modalAgregarClase').modal('hide');
                            });
                    }
                }
            });
        }
        // -------------------------------------------------------------------------------------------
        // -------------------------------------Multiselect---------------------------------------
        // -------------------------------------------------------------------------------------------
        function getAllSubclasesById() {
            VirtualSelect.init({
                ele: '#multipleSelect',
                maxValues: 4,
                multiple: true,
                optionsSelectedText: "Seleccionadas",
                optionSelectedText: "Seleccionada",
                searchPlaceholderText: "Buscar",
            })
            let arrSub = [];
            $.post("php/multiselectClases.php", {
                key: keySeguridad
            }, function(data, status) {
                data.forEach((value, key) => {
                    arrSub[key] = {
                        value: value.id_subclase,
                        label: value.id_subclase
                    };
                });
                // console.log(arrSub);
                document.querySelector('#multipleSelect').setOptions(arrSub);
            });
        }

    });

    function queryParams(params) {

        params.key = keySeguridad;
        // console.log(params);
        return params;
    }

    function ajaxRequestCl(params) {
        // console.log(params);
        var url = 'php/Select_all_clases.php';
        //consola(jQuery.parseJSON(params.data));
        var data = jQuery.parseJSON(params.data);
        $.post(url, data).then(function(res) {
            // console.log(res);
            if (res.success) {
                params.success(res.data);
            } else {
                params.error(res.message);
            }
        });
    }
</script>