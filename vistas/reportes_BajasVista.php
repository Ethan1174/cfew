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
    <!-- Modal para operar Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="modalOperarRepoBajas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Reguardo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" role="form" accept-charset="UTF-8" name="formRepoBajas" id="formRepoBajas" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <table class="table table-condensed">
                                <tr>
                                    <td><label class="control-label"><strong>RPE: </strong></span></td>
                                    <td><input type="text" name="rpeRes" id="rpeResBaja" class="inputMod form-control" value="" disabled></input></td>
                                    <td><label class="control-label"><strong>Fecha de Captura: </strong></label></td>
                                    <td><input type="date" name="fechaCapResBaja" id="fechaCapResBaja" step="1" class="inputMod form-control " required></td>
                                </tr>
                            </table>
                        </div>

                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="pesBien-tab" data-bs-toggle="tab" data-bs-target="#pesBien" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Datos del Bien</button>
                                <button class="nav-link" id="pesFactura-tab" data-bs-toggle="tab" data-bs-target="#pesFactura" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Datos de Factura</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="pesOpeRes">
                            <div class="tab-pane fade show active" id="pesBien" role="tabpanel" aria-labelledby="pesBien-tab" tabindex="0">

                                <div class="container-fluid">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td><label class="control-label"><strong>Clase: </strong></span></td>
                                            <td>
                                                <select class="inputMod form-control" id="claseSelRes" name="listaClases" placeholder="Clase"></select>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Subclase: </strong></span></td>
                                            <td>
                                                <select class="inputMod form-control" id="subClaseSelRes" name="listaSubClases" placeholder="SubClase" data-search="true" data-silent-initial-value-set="true"></select>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Descripcion: </strong></span></td>
                                            <td><textarea rows="2" cols="40" name="desRes" id="desResBaja" class="inputMod form-control" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Marca: </strong></span></td>
                                            <td><input type="text" name="marcaRes" id="marcaResBaja" class="inputMod form-control" required></input></td>
                                            <td><label class="control-label"><strong>Modelo: </strong></label></td>
                                            <td><input type="text" name="modeloRes" id="modeloResBaja" class="inputMod form-control" required></input></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Serie: </strong></span></td>
                                            <td><input type="text" name="serieRes" id="serieResBaja" class="inputMod form-control" required></input></td>
                                            <td><label class="control-label"><strong>Unidad: </strong></label></td>
                                            <td>
                                                <select class="inputMod form-control" id="unidadSelResBaja" name="unidadSelRes" placeholder="Unidad" data-search="true" data-silent-initial-value-set="true">
                                                    <option value="PIEZA">PIEZA</option>
                                                    <option value="KG">KG</option>
                                                    <option value="METRO">METRO</option>
                                                    <option value="LITRO">LITRO</option>
                                                    <option value="LOTE">LOTE</option>
                                                    <option value="CAJA">CAJA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Cantidad: </strong></span></td>
                                            <td><input type="number" min="1" name="cantidadRes" id="cantidadResBaja" class="inputMod form-control" value=1 step="any" required></input></td>
                                            <td><label class="control-label"><strong>Importe $: </strong></label></td>
                                            <td><input type="number" min="1" name="importeRes" id="importeResBaja" class="inputMod form-control" value=1 step="any" required></input></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pesFactura" role="tabpanel" aria-labelledby="pesFactura-tab" tabindex="0">
                                <div class="container">

                                    <table class="table table-condensed">
                                        <tr>
                                            <td><label class="control-label"><strong>Número: </strong></span></td>
                                            <td><input type="text" name="numResFac" id="numResFacBaja" class="inputMod form-control "></input></td>
                                            <td><label class="control-label"><strong>Fecha: </strong></label></td>
                                            <td><input type="date" name="fechaResFac" id="fechaResFacBaja" step="1" class="inputMod form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>RFC: </strong></span></td>
                                            <td><input type="text" name="rfcResFac" id="rfcResFacBaja" class="inputMod form-control"></input></td>
                                            <td><label class="control-label"><strong>Posición: </strong></label></td>
                                            <td><input type="number" name="posicionResFac" id="posicionResFacBaja" class="inputMod form-control" min=0 value="0"></input></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Archivo: </strong></span></td>
                                            <td><input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="tdPdf" colspan="3">
                                                <div id="archivoPDF"></div>
                                            </td>
                                            <td>
                                                <span id="eliminarPdf"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="btnguardarCambiosRepoBajas">Guardar Resguardo</button>
                            <input type="hidden" id="rpeResBaja2" name="rpeRes2" value="" />
                            <input type="hidden" id="idBienBaja" name="idBien" value="" />
                            <input type="hidden" id="accionResBaja" name="accion" value="Modificar" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Fin del modal para operar Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Inicio del modal para DETALLES reguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->

    <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <table class="table table-condensed">
                            <tr>
                                <td><label class="control-label"><strong>RPE: </strong></span></td>
                                <td><input type="text" id="rpeResDetalle" class="inputMod form-control" value="" disabled></input></td>
                                <td><label class="control-label"><strong>Fecha de Captura: </strong></label></td>
                                <td><input type="date" name="fechaCapDetalle" id="fechaCapDetalle" step="1" class="inputMod form-control" disabled></td>
                            </tr>
                            <tr>
                                <td><label class="control-label"><strong>Descripcion: </strong></span></td>
                                <td colspan="3">
                                    <textarea cols="40" id="desResDetalles" class="form-control" disabled></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="4">
                                    <label class="control-label"><strong>HISTORIAL DEL BIEN</strong></span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <small>
                                        <table id="historico" class="table table-condensed table-bordered table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Acción</th>
                                                    <th>Resguardante</th>
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </small>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Fin del modal para DETALLES Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->

    <div class="container">
        <div class="row-fluid">
            <div class="panel panel-info" id="opciones">
                <div class="panel-heading" id="clusterModClase1">
                    <h2 class="text-center" id="tituloDepto">Reportes de bajas</h2>
                </div>
                <div class="panelTopCatalogoResguardo">

                    <form role="formTopRes" id="formFiltro">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <select name="areaRep" id="area" class="form-control" title="Seleccione la Zona"></select>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <input type="date" name="fecha_inicioRep" id="fecha_inicioRep" class="form-control"></input>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <input type="date" name="fecha_terminoRep" id="fecha_terminoRep" class="form-control"></input>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="toolbar">

            <button type="button" disabled class="btn btn-primary" id="btnEditarRepoBajas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg> Editar</button>
            <button type="button" disabled class="btn btn-info" id="btnDetallesRepoBaja"><i class="bi bi-info-circle"></i> Detalles</button>
        </div>
        <table id="tablaReporteBajas" data-multiple-select-row="true" data-click-to-select="true" data-show-copy-rows="true" data-show-print="true" data-show-refresh="true" data-toolbar="#toolbar" data-pagination="true" data-search="true" data-method="post" data-ajax="ajaxRequestRepoBaja" data-query-params="queryParams">
            <thead>
                <tr>
                    <th class="d-none" data-field="state" data-checkbox="true" data-print-ignore="true"></th>
                    <th data-field="id_bien" data-sortable="true">ID</th>
                    <th data-field="descripcion" data-sortable="true">Descripcion</th>
                    <th data-field="serie" data-sortable="true">Serie</th>
                    <th data-field="rpe" data-sortable="true">RPE</th>
                    <th data-field="motivo_baja" data-sortable="true">Motivo de Baja</th>
                    <th data-field="fecha_baja" data-sortable="true">Fecha de baja</th>
                    <th data-field="archivo" data-sortable="true" data-print-ignore="true" data-formatter="operateFormatter">Dictamen</th>
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
    // -----------------------------------------------------------Tabla reportes_baja---------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------------------------
    $(document).ready(function() {
        var $table = $('#tablaReporteBajas');
        var select = $('#btnEditarRepoBajas');
        var select1 = $('#btnDetallesRepoBaja');

        $(function() {
            cargarTablaBT($table, dataUser.rpe + " " + dataUser.nombre, "Catálogos Bajas");

        });
        f_datos("php/areas.php", {key: keySeguridad}, function(data) {
            $("#fecha_inicioRep").val(hoy_input_date());
            $("#fecha_terminoRep").val(hoy_input_date());
            $("#area").empty();
            $.each(data, function(key, value) {
                $("#area").append('<option value="' + value.clave + '" >' + value.nombre_corto + '</option>');
            });
            $("#area").val(dataUser.area);
            $("#area").trigger("change");
        });

        $("#fecha_inicioRep ,#fecha_terminoRep").off("change").on("change", function(e) {
            // console.log($("#fecha_inicioRep").val());
            // console.log($("#fecha_terminoRep").val());
            $table.bootstrapTable('refresh');
        });


        $(function() {

            $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
                select.prop('disabled', !$table.bootstrapTable('getSelections').length);
                select1.prop('disabled', !$table.bootstrapTable('getSelections').length);
            });

            select.click(function() {
                var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
                    auxResguardosBajas = row;
                    // console.log(auxResguardosBajas);
                    return row.id
                });
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: ids
                });
            });
            select1.mouseenter(function() {
                var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
                    auxResguardosBajas = row;
                    console.log(auxResguardosBajas);
                    return row.id
                });
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: ids
                });
            });
            select.prop('disabled', true);
            select1.prop('disabled', true);
        });

        // -------------------------------------------------------------------------------------------
        // -------------------------------------CRUD Resguardos-------------------------------------
        // -------------------------------------------------------------------------------------------
        $("#btnguardarCambiosRepoBajas").click(function() {
            operarResguardoBaja();
        });
        $('#btnEditarRepoBajas').click(function() {

            modificar();
        });
        $("#btnDetallesRepoBaja").click(function() {
            detallesShow();
        });

        // -------------------------------------------------------------------------------------------
        // -------------------------------funciones CRUD Modal Resguardo----------------------------------------
        // -------------------------------------------------------------------------------------------
        function operarResguardoBaja() {
            // Dentro de la funcion, se llega a iterar.
            $('#formRepoBajas').off("submit").on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'php/operacionesResguardo.php',
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            swal(
                                    "El resguardo fue operado con exito.", {
                                        icon: "success",
                                    })
                                .then(function() {
                                    $('#modalOperarRepoBajas').modal('hide');
                                    $('#tablaReporteBajas').bootstrapTable('refresh');
                                });
                        } else {
                            swal(
                                    'Error de Operacion',
                                    'Hubo un error en la base de datos. ' + data.message,
                                    'error'
                                )
                                .then(function() {
                                    $('#modalOperarRepoBajas').modal('hide');
                                });
                        }
                    }
                });
            });
        }

        function modificar() {
            f_datos("php/clases.php", {key: keySeguridad}, function(data) {
                $(" #claseSelRes").empty();
                $.each(data, function(key, value) {
                    $("#claseSelRes").append('<option value="' + value.id_clase + '" >' + value.id_clase + ' ' + value.descripcion + '</option>');
                });
                if (auxResguardosBajas.archivo != "") {
                    // $('#archivoPDF').html("");   
                    $('#fileToUpload').attr('disabled', 'disabled');
                    $('#archivoPDF').html('<a href="pdf/' + auxResguardosBajas.rpe + '/' + auxResguardosBajas.archivo + '" target="_blank"><img src="imagenes/pdf.ico" title="pdf' + auxResguardosBajas.archivo + '">' + auxResguardosBajas.archivo + '</a>');
                    $("#eliminarPdf").html('<button id="botonEliminarPDF" type="button" class="btn btn-outline-danger"><svg xmlns = "http://www.w3.org/2000/svg"width = "16"height = "16"fill = "currentColor"class = "bi bi-trash3-fill"viewBox = "0 0 16 16" ><path d = "M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" / ></svg>Eliminar PDF </button>')
                } else {
                    $('#fileToUpload').removeAttr('disabled');
                    $('#archivoPDF').html("No se encontrarón archivos del bien " + auxResguardosBajas.id_bien + " del trabajador " + auxResguardosBajas.rpe);
                    $("#eliminarPdf").html("");
                }
                $("#fileToUpload").val("");
                // console.log(auxResguardosBajas);
                $('#rpeResBaja').val(auxResguardosBajas.rpe);
                $('#rpeResBaja2').val(auxResguardosBajas.rpe);
                $('#modalOperarRepoBajas').modal('show');
                $('#accionResBaja').val('Modificar');
                $("#idBienBaja").val(auxResguardosBajas.id_bien);
                $("#desResBaja").val(auxResguardosBajas.descripcion);
                $("#marcaResBaja").val(auxResguardosBajas.marca);
                $("#modeloResBaja").val(auxResguardosBajas.modelo);
                $("#serieResBaja").val(auxResguardosBajas.serie);
                $("#unidadSelResBaja").val(auxResguardosBajas.unidad);
                $("#cantidadResBaja").val(auxResguardosBajas.cantidad);
                $("#numResFacBaja").val(auxResguardosBajas.numero);
                $("#rfcResFacBaja").val(auxResguardosBajas.rfc);
                $("#fechaResFacBaja").val(auxResguardosBajas.fecha_factura);
                $("#fechaCapResBaja").val(auxResguardosBajas.fecha_captura);
                $("#posicionResFacBaja").val(auxResguardosBajas.posicion);
                $("#claseSelRes").val(auxResguardosBajas.clase);
                $("select#claseSelRes").trigger("change", auxResguardosBajas.subclase);
                $('#botonEliminarPDF').click(function() {
                    swal({
                        title: "¿Estás seguro de eliminar el archivo " + auxResguardosBajas.archivo + " ?",
                        text: "El archivo no se podrá recuperar una vez hecha esta operación.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal(
                                "El archivo fue eliminado con exito.", {
                                    icon: "success",
                                }
                            );
                            eliminarPDF(auxResguardosBajas.id_bien, auxResguardosBajas.rpe, auxResguardosBajas.archivo, "eliminarPDF");
                            $('#fileToUpload').removeAttr('disabled');
                            $('#archivoPDF').html("No se encontraron archivos del bien " + auxResguardosBajas.id_bien + " del trabajador " + auxResguardosBajas.rpe);
                            $("#eliminarPdf").html("");
                            $($table).bootstrapTable('refresh');
                        } else {
                            swal(
                                'Sin cambios',
                                'Tu archivo sigue guardado',
                                'error'
                            )
                        }
                    });
                });

            });
            $("select#claseSelRes").change(function(event, valor) {
                // console.log(valor);
                f_datos("php/subclases.php", {
                    id_clase: $("#claseSelRes option:selected").val(), key: keySeguridad
                }, function(data) {
                    $("#subClaseSelRes").empty();
                    $.each(data, function(key, value) {
                        // console.log(value);
                        $("#subClaseSelRes").append('<option value="' + value.id_subclase + '" >' + value.id_subclase + ' ' + value.descripcion + '</option>');
                    });
                    if (valor)
                        $("#subClaseSelRes").val(valor);
                });
            });


        }

        function eliminarPDF(id, rpe, nombreArchivo, accion) {
            $.ajax({
                url: 'php/operacionesResguardo.php',
                method: 'POST',
                data: {
                    idBien: id,
                    rpeRes: rpe,
                    archivo: nombreArchivo,
                    accion: accion
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }

        function detallesShow() {
            // console.log(auxResguardosBajas);
            $("#modalDetalles #exampleModalLabel").html("Detalles de resguardo Id." + auxResguardosBajas.id_bien);
            $('#rpeResDetalle').val(auxResguardosBajas.rpe);
            $("#fechaCapDetalle").val(auxResguardosBajas.fecha_captura);
            $("#desResDetalles").val(auxResguardosBajas.descripcion);
            $("#importeResBaja").val(auxResguardosBajas.importe);
            $('#modalDetalles').modal('show');
            f_datos("php/selectBienesByHistorico.php", {
                id_bien: auxResguardosBajas.id_bien, key: keySeguridad
            }, function(datHist) {
                // console.log(datHist);
                $("#historico tbody").empty();
                $.each(datHist, function(key, value) {
                    tr = $("<tr />").appendTo($("#historico tbody"));
                    $("<td>").html(value.fecha).appendTo(tr);
                    $("<td>").html(value.accion).appendTo(tr);
                    $("<td>").html(value.rpe + " " + value.nombrerpe).appendTo(tr);
                    $("<td>").html(value.usuario + " " + value.nombreusuario).appendTo(tr);
                });
            });
        }
    });

    function operateFormatter(value, row, index) {
        // console.log(row);
        if (row.url_dictamen != "La carpeta no existe" && row.url_dictamen != null) {
            return [
                '<a href="' + row.url_dictamen + '" target="_blank"><img src="imagenes/pdf.ico"></a><span>Ver archivo</span>'
            ].join('')
        } else {
            return [
                '<a href="#"><img src="imagenes/pdfNoFile.ico"></a><span>Sin archivo</span>'
            ].join('')
        }

    }

    function queryParams(params) {
        // console.log(String($("#fecha_inicioRep").val()));
        // console.log(String($("#fecha_terminoRep").val()));
        params.key = keySeguridad;
        params.fecha_inicio = $("#fecha_inicioRep").val();
        params.fecha_termino = $("#fecha_terminoRep").val();
        // console.log(params);
        return params;
    }

    function ajaxRequestRepoBaja(params) {
        // console.log(params);
        var url = 'php/selectAllRepoBaja.php';
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